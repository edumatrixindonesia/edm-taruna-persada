<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapels = Mapel::all();

        return view('mapel.index', [
            'mapels' => $mapels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ], [
            'name.required' => 'Nama Mata Pelajaran harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        Mapel::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('mapel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapelId)
    {
        return view('mapel.edit', [
            'mapel' =>  $mapelId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapelId)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ], [
            'name.required' => 'Nama Mata Pelajaran harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        $mapelId->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('mapel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapelId)
    {
        $mapelId->delete();
        return redirect()->route('mapel.index');
    }
}
