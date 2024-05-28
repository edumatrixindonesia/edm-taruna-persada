<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\SubProgram;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subProgram = SubProgram::with('program')->get();

        return view('subProgram.index', [
            'subPrograms' => $subProgram,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::all();

        return view('subProgram.create', [
            'programs' => $program,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'programId' => ['required', 'exists:programs,id'],
            'subProgram' => ['required', 'string'],
        ], [
            'programId.required' => 'Program harus diisi!',
            'subProgram.required' => 'Nama Sub Program harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->subProgram)->replace(' ', '-', $request->subProgram));

        SubProgram::create([
            'programId' => $request->programId,
            'subProgram' => $request->subProgram,
            'slug' => $slug,
        ]);

        return redirect()->route('sub-program.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubProgram $subProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubProgram $subProgramId)
    {
        $program = Program::all();

        return view('subProgram.edit', [
            'programs' => $program,
            'subProgram' => $subProgramId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubProgram $subProgramId)
    {
        $request->validate([
            'programId' => ['required', 'exists:programs,id'],
            'subProgram' => ['required', 'string'],
        ], [
            'programId.required' => 'Program harus diisi!',
            'subProgram.required' => 'Nama Sub Program harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->subProgram)->replace(' ', '-', $request->subProgram));

        $subProgramId->update([
            'programId' => $request->programId,
            'subProgram' => $request->subProgram,
            'slug' => $slug,
        ]);

        return redirect()->route('sub-program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubProgram $subProgramId)
    {
        $subProgramId->delete();
        return redirect()->route('sub-program.index');
    }
}
