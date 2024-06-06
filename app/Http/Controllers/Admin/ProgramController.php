<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();

        return view('admin.program.index', [
            'programs' => $programs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'namaProgram' => ['required', 'string'],
            ],
            [
                'namaProgram.required' => 'Nama Program harus diisi!',
            ],
        );

        $slug = Str::lower(Str::of($request->namaProgram)->replace(' ', '-', $request->namaProgram));

        Program::create([
            'namaProgram' => $request->namaProgram,
            'slug' => $slug,
        ]);

        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $programId)
    {
        return view('admin.program.edit', [
            'program' => $programId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $programId)
    {
        $request->validate(
            [
                'namaProgram' => ['required', 'string'],
            ],
            [
                'namaProgram.required' => 'Nama Program harus diisi!',
            ],
        );

        $slug = Str::lower(Str::of($request->namaProgram)->replace(' ', '-', $request->namaProgram));

        $programId->update([
            'namaProgram' => $request->namaProgram,
            'slug' => $slug,
        ]);

        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $programId)
    {
        $programId->delete();
        return redirect()->route('program.index');
    }
}
