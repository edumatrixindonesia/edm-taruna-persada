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

        return view('admin.province.index', [
            'provinces' => $province,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.province.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'nameCapitalCity' => ['required', 'string'],
            ],
            [
                'nameCapitalCity.required' => 'Nama Ibu Kota Provinsi harus diisi!',
                'name.required' => 'Nama Provinsi harus diisi!',
            ]
        );

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));
        $slugCapital = Str::lower(Str::of($request->nameCapitalCity)->replace(' ', '-', $request->nameCapitalCity));

        Province::create([
            'name' => $request->name,
            'slug' => $slug,
            'nameCapitalCity' => $request->nameCapitalCity,
            'slugCapitalCity' => $slugCapital,
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
        return view('admin.province.edit', [
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
                'nameCapitalCity' => ['required', 'string'],
            ],
            [
                'name' => 'Nama Provinsi harus diisi!',
                'nameCapitalCity' => 'Nama Ibu Kota Provinsi harus diisi!',
            ]
        );

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));
        $slugCapital = Str::lower(Str::of($request->nameCapitalCity)->replace(' ', '-', $request->nameCapitalCity));

        $provinceId->update([
            'name' => $request->name,
            'slug' => $slug,
            'nameCapitalCity' => $request->nameCapitalCity,
            'slugCapitalCity' => $slugCapital,
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
