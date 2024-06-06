<?php

namespace App\Http\Controllers;

use App\Imports\DistrictImport;
use App\Models\Regency;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $district = District::with('regency')->get();

        return view('admin.district.index', [
            'districts' => $district,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regency = Regency::all();
        return view('admin.district.create', [
            'regencies' => $regency,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'regencyId' => ['required', 'exists:regencies,id'],
            'name' => ['required', 'string'],
        ], [
            'regencyId.required' => 'Kabupaten/Kota harus diisi!',
            'name.required' => 'Nama Kecamatan harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        District::create([
            'regencyId' => $request->regencyId,
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.district.index');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xlsx'],
        ]);

        Excel::import(new DistrictImport, $request->file('file'));

        return redirect()->route('admin.district.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $districtId)
    {
        $regency = Regency::all();

        return view('admin.district.edit', [
            'regencies' => $regency,
            'district' => $districtId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $districtId)
    {
        $request->validate([
            'regencyId' => ['required', 'exists:regencies,id'],
            'name' => ['required', 'string'],
        ], [
            'regencyId.required' => 'Kabupaten/Kota harus diisi!',
            'name.required' => 'Nama Kecamatan harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        $districtId->update([
            'regencyId' => $request->regencyId,
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $districtId)
    {
        $districtId->delete();

        return redirect()->route('admin.district.index');
    }
}
