<?php

namespace App\Http\Controllers\Admin;

use App\Models\Regency;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\RegencyImport;
use Maatwebsite\Excel\Facades\Excel;

class RegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regency = Regency::with('province')->get();

        return view('admin.regency.index', [
            'regencies' => $regency,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $province = Province::all();

        return view('admin.regency.create', [
            'provinces' => $province,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provinceId' => ['required', 'exists:provinces,id'],
            'name' => ['required', 'string'],
        ], [
            'provinceId.required' => 'Nama Provinsi harus diisi!',
            'name.required' => 'Nama Kabupaten/Kota harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        Regency::create([
            'provinceId' => $request->provinceId,
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('regency.index');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xlsx'],
        ]);

        Excel::import(new RegencyImport, $request->file('file'));

        return redirect()->route('regency.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regency $regencyId)
    {
        $province = Province::all();

        return view('admin.regency.edit', [
            'provinces' => $province,
            'regency' => $regencyId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regency $regencyId)
    {
        $request->validate([
            'provinceId' => ['required', 'exists:provinces,id'],
            'name' => ['required', 'string'],
        ], [
            'provinceId.required' => 'Nama Provinsi harus diisi!',
            'name.required' => 'Nama Kabupaten/Kota harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        $regencyId->update([
            'provinceId' => $request->provinceId,
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('regency.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regency $regencyId)
    {
        $regencyId->delete();

        return redirect()->route('regency.index');
    }
}
