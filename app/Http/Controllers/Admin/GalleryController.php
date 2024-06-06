<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::all();

        return view('admin.gallery.index', [
            'galleries' => $gallery,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        $file = $request->file('image');
        $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'gallery-');
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . now()->format('dmyhis') . '.' . $fileExtension;
        $fileUrl = $file->storeAs('images/gallery', $name);

        Gallery::create([
            'image' => $fileUrl,
        ]);

        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $galleryId)
    {
        Storage::delete($galleryId->image);
        $galleryId->delete();
        return redirect()->route('gallery.index');
    }
}
