<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonial.index', [
            'testimonials' => $testimonials,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswaName' => ['required'],
            'photo' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'description' => ['required'],
        ]);

        $lowerName = Str::lower(Str::of($request->siswaName)->replace(' ', '-', $request->siswaName));

        $file = $request->file('photo');
        $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'testimonial-' . $lowerName, $file->getClientOriginalName());
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . '.' . $fileExtension;
        $fileUrl = $file->storeAs('images/landing', $name);

        Testimonial::create([
            'siswaName' => $request->siswaName,
            'description' => $request->description,
            'photo' => $fileUrl,
        ]);

        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonialId)
    {
        return view('admin.testimonial.edit', [
            'testimonial' => $testimonialId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonialId)
    {
        $request->validate([
            'siswaName' => ['required'],
            'description' => ['required'],
            'photo' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        $lowerName = Str::lower(Str::of($request->siswaName)->replace(' ', '-', $request->siswaName));
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'testimonial-' . $lowerName, $$file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $name = $fileName . '.' . $fileExtension;
            $fileUrl = $file->storeAs('images/landing', $name);
        } else {
            $fileUrl = $testimonialId->photo;
        }

        $testimonialId->update([
            'siswaName' => $request->siswaName,
            'description' => $request->description,
            'photo' => $fileUrl,
        ]);

        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonialId)
    {
        Storage::delete($testimonialId->photo);
        $testimonialId->delete();
        return redirect()->route('testimonial.index');
    }
}
