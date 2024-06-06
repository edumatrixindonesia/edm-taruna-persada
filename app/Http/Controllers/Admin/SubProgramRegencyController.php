<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regency;
use App\Models\SubProgram;
use Illuminate\Http\Request;

class SubProgramRegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subprogram = SubProgram::with('regencies')->get();

        return view('admin.subProgramPerKota.index', [
            'subPrograms' => $subprogram,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = SubProgram::all();
        $regency = Regency::all();

        return view('admin.subProgramPerKota.create', [
            'programs' => $program,
            'regencies' => $regency,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subProgramId' => ['required', 'exists:sub_programs,id'],
            'regencyId' => ['required', 'exists:regencies,id'],
        ], [
            'subProgramId.required' => 'Sub Program harus diisi!',
            'regencyId.required' => 'Kabupaten/Kota harus diisi!',
        ]);

        $kota = $request->regencyId;

        foreach ($kota as $key => $value) {
            $program = SubProgram::find($request->subProgramId);
            $program->regencies()->attach($kota[$key]);
        }

        return redirect()->route('sub-program-regency.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
