<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MasterTeacher;
use App\Http\Controllers\Controller;

class MasterTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masterTeacher = MasterTeacher::all();

        return view('admin.tutor.index', [
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

        return view('admin.tutor.create', [
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
            'name' => ['required'],
            'theme' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'jenjang' => ['required'],
            'university' => ['required'],
        ], [
            'theme.required' => 'Tema harus diisi!',
            'name.required' => 'Nama Master Teacher harus diisi!',
            'image.required' => 'Foto harus diisi!',
            'jenjang.required' => 'Jenjang Pendidikan harus diisi!',
            'university.required' => 'Nama Universitas harus diisi!',
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        $file = $request->file('image');
        $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), $slug, $file->getClientOriginalName());
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . '.' . $fileExtension;
        $fileUrl = $file->storeAs('images/master-teacher', $name);

        $file2 = $request->file('theme');
        $fileName2 = Str::of($file2->getClientOriginalName())->replace($file2->getClientOriginalName(), 'background-' . $slug, $file2->getClientOriginalName());
        $fileExtension2 = $file2->getClientOriginalExtension();
        $name2 = $fileName2 . '.' . $fileExtension2;
        $fileUrl2 = $file2->storeAs('images/master-teacher', $name2);

        MasterTeacher::create([
            'theme' => $fileUrl2,
            'name' => $request->name,
            'image' => $fileUrl,
            'jenjang' => $request->jenjang,
            'university' => $request->university,
            'description' => $request->description,
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

        return view('admin.tutor.edit', [
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
