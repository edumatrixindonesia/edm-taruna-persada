<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Regency;
use Illuminate\Http\Request;

class MapelRegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapelReg = Mapel::with('regencies')->get();

        return view('mapelPerKota.index', [
            'mapels' => $mapelReg,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapel = Mapel::all();
        $regency = Regency::with('province')->get();

        return view('mapelPerKota.create', [
            'mapels' => $mapel,
            'regencies' => $regency,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mapelId' => ['required', 'exists:mapels,id'],
            'regencyId' => ['required', 'exists:regencies,id'],
        ], [
            'mapelId.required' => 'Mata Pelajaran harus diisi!',
            'regencyId.required' => 'Kabupaten/Kota harus diisi!',
        ]);

        $kota = $request->regencyId;

        foreach ($kota as $key => $value) {
            $data = [
                'mapelId' => $request->mapelId,
                'regencyId' => $kota[$key],
            ];
            $mapel = Mapel::find($request->mapelId);
            $mapel->regencies()->attach($kota[$key]);
        }

        return redirect()->route('mapel-regency.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mapelId)
    {
        $mapels = Mapel::with('regencies')->get();
        $mapel = Mapel::where('id', $mapelId)->with('regencies')->get();
        $regency = Regency::with('province')->get();

        return view('mapelPerKota.edit', [
            'mapels' => $mapels,
            'mapel' => $mapel,
            'mapelId' => $mapelId,
            'regencies' => $regency,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapelId)
    {
        $request->validate([
            'mapelId' => ['required', 'exists:mapels,id'],
            'regencyId' => ['required', 'exists:regencies,id'],
        ], [
            'mapelId.required' => 'Mata Pelajaran harus diisi!',
            'regencyId.required' => 'Kabupaten/Kota harus diisi!',
        ]);

        $kota = $request->regencyId;

        foreach ($kota as $key => $value) {
            $mapelId->regencies()->sync($kota[$key]);
        }

        return redirect()->route('mapel-regency.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
