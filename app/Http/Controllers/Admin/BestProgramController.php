<?php

namespace App\Http\Controllers\Admin;

use App\Models\BestProgram;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BestProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = BestProgram::all();

        return view('admin.best-program.index', [
            'programs' => $programs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.best-program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'background' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'benefit' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'icon' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        $file = $request->file('image');
        $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'program-' . $slug, $file->getClientOriginalName());
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . '.' . $fileExtension;
        $fileUrl = $file->storeAs('images/best-program', $name);

        $file2 = $request->file('benefit');
        $fileName2 = Str::of($file2->getClientOriginalName())->replace($file2->getClientOriginalName(), 'benefit-program-' . $slug, $file2->getClientOriginalName());
        $fileExtension2 = $file2->getClientOriginalExtension();
        $name2 = $fileName2 . '.' . $fileExtension2;
        $fileUrl2 = $file2->storeAs('images/best-program', $name2);

        $file3 = $request->file('icon');
        $fileName3 = Str::of($file3->getClientOriginalName())->replace($file3->getClientOriginalName(), 'icon-program-' . $slug, $file3->getClientOriginalName());
        $fileExtension3 = $file3->getClientOriginalExtension();
        $name3 = $fileName3 . '.' . $fileExtension3;
        $fileUrl3 = $file3->storeAs('images/best-program', $name3);

        $file4 = $request->file('background');
        $fileName4 = Str::of($file4->getClientOriginalName())->replace($file4->getClientOriginalName(), 'background-program-' . $slug, $file4->getClientOriginalName());
        $fileExtension4 = $file4->getClientOriginalExtension();
        $name4 = $fileName4 . '.' . $fileExtension4;
        $fileUrl4 = $file4->storeAs('images/best-program', $name4);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'image' => $fileUrl,
            'benefit' => $fileUrl2,
            'icon' => $fileUrl3,
            'background' => $fileUrl4,
        ];
        BestProgram::create($data);

        return redirect()->route('best-program.index');
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
    public function edit(BestProgram $bestProgramId)
    {
        return view('admin.best-program.edit', [
            'program' => $bestProgramId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BestProgram $bestProgramId)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'background' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'benefit' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'icon' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        $slug = Str::lower(Str::of($request->name)->replace(' ', '-', $request->name));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'program-' . $slug, $file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $name = $fileName . '.' . $fileExtension;
            $fileUrl = $file->storeAs('images/best-program', $name);
        } else {
            $fileUrl = $bestProgramId->image;
        }

        if ($request->hasFile('benefit')) {
            $file2 = $request->file('benefit');
            $fileName2 = Str::of($file2->getClientOriginalName())->replace($file2->getClientOriginalName(), 'benefit-program-' . $slug, $file2->getClientOriginalName());
            $fileExtension2 = $file2->getClientOriginalExtension();
            $name2 = $fileName2 . '.' . $fileExtension2;
            $fileUrl2 = $file2->storeAs('images/best-program', $name2);
        } else {
            $fileUrl2 = $bestProgramId->benefit;
        }

        if ($request->hasFile('icon')) {
            $file3 = $request->file('icon');
            $fileName3 = Str::of($file3->getClientOriginalName())->replace($file3->getClientOriginalName(), 'icon-program-' . $slug, $file3->getClientOriginalName());
            $fileExtension3 = $file3->getClientOriginalExtension();
            $name3 = $fileName3 . '.' . $fileExtension3;
            $fileUrl3 = $file3->storeAs('images/best-program', $name3);
        } else {
            $fileUrl3 = $bestProgramId->icon;
        }

        if ($request->hasFile('background')) {
            $file4 = $request->file('background');
            $fileName4 = Str::of($file4->getClientOriginalName())->replace($file4->getClientOriginalName(), 'background-program-' . $slug, $file4->getClientOriginalName());
            $fileExtension4 = $file4->getClientOriginalExtension();
            $name4 = $fileName4 . '.' . $fileExtension4;
            $fileUrl4 = $file4->storeAs('images/best-program', $name4);
        } else {
            $fileUrl4 = $bestProgramId->background;
        }

        $bestProgramId->update([
            'name' => $request->name,
            'description' => $request->description,
            'background' => $fileUrl4,
            'image' => $fileUrl,
            'benefit' => $fileUrl2,
            'icon' => $fileUrl3,
            'slug' => $slug,
        ]);

        return redirect()->route('best-program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BestProgram $bestProgramId)
    {
        $bestProgramId->delete();
        return redirect()->route('best-program.index');
    }
}
