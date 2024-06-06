<?php

namespace App\Http\Controllers\Admin;

use App\Models\Landing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function index()
    {
        $page = Landing::all();

        return view('admin.page.index', [
            'pages' => $page,
        ]);
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaSection' => ['required'],
            'title' => ['required'],
            'content' => ['sometimes'],
            'image_1' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_2' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_3' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_4' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_5' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ], [
            'namaSection.required' => 'Nama Section harus diisi!',
            'title.required' => 'Judul Section harus diisi!',
            'content.required' => 'Isi Konten Section harus diisi!',
        ]);

        // image 1
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'image-1-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension = $file->getClientOriginalExtension();
            $name = $fileName . $fileExtension;
            $fileUrl = $file->storeAs('images/landing', $name);
        } else {
            $fileUrl = null;
        }

        // image 2
        if ($request->hasFile('image_2')) {
            $file2 = $request->file('image_2');
            $fileName2 = Str::of($file2->getClientOriginalName())->replace($file2->getClientOriginalName(), 'image-2-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension2 = $file2->getClientOriginalExtension();
            $name2 = $fileName2 . $fileExtension2;
            $fileUrl2 = $file2->storeAs('images/landing', $name2);
        } else {
            $fileUrl2 = null;
        }

        // image 3
        if ($request->hasFile('image_3')) {
            $file3 = $request->file('image_3');
            $fileName3 = Str::of($file3->getClientOriginalName())->replace($file3->getClientOriginalName(), 'image-3-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension3 = $file3->getClientOriginalExtension();
            $name3 = $fileName3 . $fileExtension3;
            $fileUrl3 = $file3->storeAs('images/landing', $name3);
        } else {
            $fileUrl3 = null;
        }

        // image 4
        if ($request->hasFile('image_4')) {
            $file4 = $request->file('image_4');
            $fileName4 = Str::of($file4->getClientOriginalName())->replace($file4->getClientOriginalName(), 'image-4-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension4 = $file4->getClientOriginalExtension();
            $name4 = $fileName4 . $fileExtension4;
            $fileUrl4 = $file4->storeAs('images/landing', $name4);
        } else {
            $fileUrl4 = null;
        }

        // image 5
        if ($request->hasFile('image_5')) {
            $file5 = $request->file('image_5');
            $fileName5 = Str::of($file5->getClientOriginalName())->replace($file5->getClientOriginalName(), 'image-5-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension5 = $file5->getClientOriginalExtension();
            $name5 = $fileName5 . $fileExtension5;
            $fileUrl5 = $file5->storeAs('images/landing', $name5);
        } else {
            $fileUrl5 = null;
        }

        Landing::create([
            'namaSection' => $request->namaSection,
            'title' => $request->title,
            'content' => $request->content,
            'image_1' => $fileUrl,
            'image_2' => $fileUrl2,
            'image_3' => $fileUrl3,
            'image_4' => $fileUrl4,
            'image_5' => $fileUrl5,
        ]);

        return redirect()->route('page.index');
    }

    public function edit(Landing $landingId)
    {
        return view('admin.page.edit', [
            'page' => $landingId,
        ]);
    }

    public function update(Request $request, Landing $landingId)
    {
        $request->validate([
            'namaSection' => ['required'],
            'title' => ['required'],
            'content' => ['sometimes'],
            'image_1' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_2' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_3' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_4' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'image_5' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ], [
            'namaSection.required' => 'Nama Section harus diisi!',
            'title.required' => 'Judul Section harus diisi!',
            'content.required' => 'Isi Konten Section harus diisi!',
        ]);

        // image 1
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'image-1-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension = $file->getClientOriginalExtension();
            $name = $fileName . '.' . $fileExtension;
            $fileUrl = $file->storeAs('images/landing', $name);
            if ($landingId->image_1 == null) {
                $fileUrl = $file->storeAs('images/landing', $name);
            } else {
                Storage::delete($landingId->image_1);
                $fileUrl = $file->storeAs('images/landing', $name);
            }
        } else {
            if ($landingId->image_1 == null) {
                $fileUrl = null;
            } else {
                $fileUrl = $landingId->image_1;
            }
        }

        // image 2
        if ($request->hasFile('image_2')) {
            $file2 = $request->file('image_2');
            $fileName2 = Str::of($file2->getClientOriginalName())->replace($file2->getClientOriginalName(), 'image-2-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension2 = $file2->getClientOriginalExtension();
            $name2 = $fileName2 . '.' . $fileExtension2;
            if ($landingId->image_2 == null) {
                $fileUrl2 = $file2->storeAs('images/landing', $name2);
            } else {
                Storage::delete($landingId->image_2);
                $fileUrl2 = $file2->storeAs('images/landing', $name2);
            }
        } else {
            if ($landingId->image_2 == null) {
                $fileUrl2 = null;
            } else {
                $fileUrl2 = $landingId->image_2;
            }
        }

        // image 3
        if ($request->hasFile('image_3')) {
            $file3 = $request->file('image_3');
            $fileName3 = Str::of($file3->getClientOriginalName())->replace($file3->getClientOriginalName(), 'image-3-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension3 = $file3->getClientOriginalExtension();
            $name3 = $fileName3 . '.' . $fileExtension3;
            if ($landingId->image_3 == null) {
                $fileUrl3 = $file3->storeAs('images/landing', $name3);
            } else {
                Storage::delete($landingId->image_3);
                $fileUrl3 = $file3->storeAs('images/landing', $name3);
            }
        } else {
            if ($landingId->image_3 == null) {
                $fileUrl3 = null;
            } else {
                $fileUrl3 = $landingId->image_3;
            }
        }

        // image 4
        if ($request->hasFile('image_4')) {
            $file4 = $request->file('image_4');
            $fileName4 = Str::of($file4->getClientOriginalName())->replace($file4->getClientOriginalName(), 'image-4-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension4 = $file4->getClientOriginalExtension();
            $name4 = $fileName4 . '.' . $fileExtension4;
            if ($landingId->image_4 == null) {
                $fileUrl4 = $file4->storeAs('images/landing', $name4);
            } else {
                Storage::delete($landingId->image_4);
                $fileUrl4 = $file4->storeAs('images/landing', $name4);
            }
        } else {
            if ($landingId->image_4 == null) {
                $fileUrl4 = null;
            } else {
                $fileUrl4 = $landingId->image_4;
            }
        }

        // image 5
        if ($request->hasFile('image_5')) {
            $file5 = $request->file('image_5');
            $fileName5 = Str::of($file5->getClientOriginalName())->replace($file5->getClientOriginalName(), 'image-5-' . Str::lower(Str::of($request->namaSection)->replace(' ', '-', $request->namaSection)));
            $fileExtension5 = $file5->getClientOriginalExtension();
            $name5 = $fileName5 . '.' . $fileExtension5;
            if ($landingId->image_5 == null) {
                $fileUrl5 = $file5->storeAs('images/landing', $name5);
            } else {
                Storage::delete($landingId->image_5);
                $fileUrl5 = $file5->storeAs('images/landing', $name5);
            }
        } else {
            if ($landingId->image_5 == null) {
                $fileUrl5 = null;
            } else {
                $fileUrl5 = $landingId->image_5;
            }
        }

        $landingId->update([
            'namaSection' => $request->namaSection,
            'title' => $request->title,
            'content' => $request->content,
            'image_1' => $fileUrl,
            'image_2' => $fileUrl2,
            'image_3' => $fileUrl3,
            'image_4' => $fileUrl4,
            'image_5' => $fileUrl5,
        ]);

        return redirect()->route('page.index');
    }

    public function destroy(Landing $landingId)
    {
        $landingId->delete();
        return redirect()->route('page.index');
    }
}
