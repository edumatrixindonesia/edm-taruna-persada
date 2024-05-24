<?php

namespace App\Http\Controllers\Admin;

use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\ProvinceImport;
use Maatwebsite\Excel\Facades\Excel;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $province = Province::all();

        return view('province.index', [
            'provinces' => $province,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('province.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
            ],
            [
                'name' => 'Nama Provinsi harus diisi!',
            ]
        );

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        Province::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('province.index');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xlsx'],
        ]);

        Excel::import(new ProvinceImport, $request->file('file'));

        return redirect()->route('province.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Province $provinceId)
    {
        return view('province.edit', [
            'province' => $provinceId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Province $provinceId)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
            ],
            [
                'name' => 'Nama Provinsi harus diisi!',
            ]
        );

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        $provinceId->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('province.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $provinceId)
    {
        $provinceId->delete();

        return redirect()->route('province.index');
    }
}
