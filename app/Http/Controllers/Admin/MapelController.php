<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapels = Mapel::all();

        return view('admin.mapel.index', [
            'mapels' => $mapels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::all();

        return view('admin.mapel.create', [
            'programs' => $program,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'programId' => ['required', 'exists:programs,id'],
                'name' => ['required', 'string'],
            ],
            [
                'programId.required' => 'Program harus diisi!',
                'name.required' => 'Nama Mata Pelajaran harus diisi!',
            ]
        );

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        Mapel::create([
            'programId' => $request->programId,
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
        $program = Program::all();

        return view('admin.mapel.edit', [
            'mapel' =>  $mapelId,
            'programs' => $program,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapelId)
    {
        $request->validate(
            [
                'programId' => ['required', 'exists:programs,id'],
                'name' => ['required', 'string'],
            ],
            [
                'programId.required' => 'Program harus diisi!',
                'name.required' => 'Nama Mata Pelajaran harus diisi!',
            ]
        );

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        $mapelId->update([
            'programId' => $request->programId,
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
