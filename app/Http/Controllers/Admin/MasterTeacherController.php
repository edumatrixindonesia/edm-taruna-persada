<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\MasterTeacher;
use App\Models\Program;
use Illuminate\Http\Request;

class MasterTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masterTeacher = MasterTeacher::all();

        return view('tutor.index', [
            'tutors' => $masterTeacher,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapel = Mapel::all();
        $program = Program::all();

        return view('tutor.create', [
            'mapels' => $mapel,
            'programs' => $program,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'theme' => ['required'],
            'name' => ['required'],
            'mapel' => ['required'],
            'program' => ['required'],
        ], [
            'theme.required' => 'Tema harus diisi!',
            'name.required' => 'Nama Master Teacher harus diisi!',
            'mapel.required' => 'Mata Pelajaran harus diisi!',
            'program.required' => 'Program harus diisi!',
        ]);

        MasterTeacher::create([
            'theme' => $request->theme,
            'name' => $request->name,
            'mapel' => implode(', ', $request->mapel),
            'program' => implode(', ', $request->program),
        ]);

        return redirect()->route('tutor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterTeacher $masterTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterTeacher $masterTeacherId)
    {
        $mapel = Mapel::all();
        $program = Program::all();

        $arr_mapel = explode(', ', $masterTeacherId['mapel']);
        $arr_program = explode(', ', $masterTeacherId['program']);

        return view('tutor.edit', [
            'mapels' => $mapel,
            'programs' => $program,
            'tutor' => $masterTeacherId,
            'arr_mapel' => $arr_mapel,
            'arr_program' => $arr_program,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterTeacher $masterTeacherId)
    {
        $request->validate([
            'theme' => ['required'],
            'name' => ['required'],
            'mapel' => ['required'],
            'program' => ['required'],
        ], [
            'theme.required' => 'Tema harus diisi!',
            'name.required' => 'Nama Master Teacher harus diisi!',
            'mapel.required' => 'Mata Pelajaran harus diisi!',
            'program.required' => 'Program harus diisi!',
        ]);

        $masterTeacherId->update([
            'theme' => $request->theme,
            'name' => $request->name,
            'mapel' => implode(', ', $request->mapel),
            'program' => implode(', ', $request->program),
        ]);

        return redirect()->route('tutor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterTeacher $masterTeacherId)
    {
        $masterTeacherId->delete();
        return redirect()->route('tutor.index');
    }
}
