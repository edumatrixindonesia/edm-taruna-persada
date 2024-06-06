<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\MediaMassa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaMassaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = MediaMassa::all();
        return view('admin.media-massa.index', [
            'medias' => $media,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media-massa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:png,jpg, jpeg', 'max:1024'],
            'media' => ['required'],
        ]);

        $file = $request->file('image');
        $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'media-massa-');
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . now()->format('dmyhis') . '.' . $fileExtension;
        $fileUrl = $file->storeAs('images/media-massa', $name);

        MediaMassa::create([
            'media' => $request->media,
            'image' => $fileUrl,
        ]);

        return redirect()->route('media-massa.index');
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
    public function destroy(MediaMassa $mediaMassaId)
    {
        Storage::delete($mediaMassaId->image);
        $mediaMassaId->delete();
        return redirect()->route('media-massa.index');
    }
}
