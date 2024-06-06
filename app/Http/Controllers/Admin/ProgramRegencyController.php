<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Regency;
use Illuminate\Http\Request;

class ProgramRegencyController extends Controller
{
    public function index()
    {
        $programs = Program::with('regencies')->get();

        return view('admin.programPerKota.index', [
            'programs' => $programs,
        ]);
    }

    public function create()
    {
        $regency = Regency::all();
        $program = Program::all();

        return view('admin.programPerKota.create', [
            'regencies' => $regency,
            'programs' => $program,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'programId' => ['required', 'exists:programs,id'],
            'regencyId' => ['required', 'exists:regencies,id'],
        ], [
            'programId.required' => 'Program harus diisi!',
            'regencyId.required' => 'Kabupaten/Kota harus diisi!',
        ]);

        $kota = $request->regencyId;

        foreach ($kota as $key => $value) {
            $program = Program::find($request->programId);
            $program->regencies()->attach($kota[$key]);
        }

        return redirect()->route('program-regency.index');
    }
}
