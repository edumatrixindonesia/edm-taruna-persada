<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AccuracyProgram;
use Illuminate\Support\Facades\Storage;

class AccuracyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub = AccuracyProgram::all();

        return view('admin.best-program.sub.index', [
            'subs' => $sub,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.best-program.sub.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub' => ['required'],
            'package' => ['required'],
            'benefit' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        $data = AccuracyProgram::where([['sub', '=', $request->sub]])->latest()->first();

        if ($data) {
            $sequence = $data->seq + 1;
        } else {
            $sequence = 1;
        }

        $file = $request->file('benefit');
        $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'benefit-akurasi-' . Str::lower($request->sub) . '-' . Str::lower($request->package), $file->getClientOriginalName());
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . '.' . $fileExtension;
        $fileUrl = $file->storeAs('images/best-program', $name);

        AccuracyProgram::create([
            'benefit' => $fileUrl,
            'sub' => $request->sub,
            'package' => $request->package,
            'seq' => $sequence,
        ]);

        return redirect()->route('akurasi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccuracyProgram $accuracyProgramId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccuracyProgram $accuracyProgramId)
    {
        return view('admin.best-program.sub.edit', [
            'akurasi' => $accuracyProgramId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccuracyProgram $accuracyProgramId)
    {
        $request->validate([
            'sub' => ['required'],
            'package' => ['required'],
            'benefit' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        if ($request->hasFile('benefit')) {
            $file = $request->file('benefit');
            $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'benefit-akurasi-' . Str::lower($request->sub) . '-' . Str::lower($request->package), $file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $name = $fileName . '.' . $fileExtension;
            Storage::delete($accuracyProgramId->benefit);
            $fileUrl = $file->storeAs('images/best-program', $name);
        } else {
            $fileUrl = $accuracyProgramId->benefit;
        }

        $accuracyProgramId->update([
            'benefit' => $fileUrl,
            'sub' => $request->sub,
            'package' => $request->package,
        ]);

        return redirect()->route('akurasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccuracyProgram $accuracyProgramId)
    {
        Storage::delete($accuracyProgramId->benefit);
        $accuracyProgramId->delete();

        return redirect()->route('akurasi.index');
    }
}
