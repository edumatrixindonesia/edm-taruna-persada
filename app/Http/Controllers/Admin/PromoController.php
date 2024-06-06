<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promo = Promo::orderBy('seq', 'asc')->get();

        return view('admin.promo.index', [
            'promos' => $promo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promo.create');
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
        $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'promo-');
        $fileExtension = $file->getClientOriginalExtension();
        $name = $fileName . now()->format('dmyhis') . '.' . $fileExtension;
        $fileUrl = $file->storeAs('images/promo', $name);

        Promo::create([
            'image' => $fileUrl,
        ]);

        return redirect()->route('promo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promo $promoId)
    {
        return view('admin.promo.edit', [
            'promo' => $promoId
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promoId)
    {
        $request->validate([
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::of($file->getClientOriginalName())->replace($file->getClientOriginalName(), 'promo-');
            $fileExtension = $file->getClientOriginalExtension();
            $name = $fileName . now()->format('dmyhis') . '.' . $fileExtension;
            Storage::delete($promoId->image);
            $fileUrl = $file->storeAs('images/promo', $name);
        } else {
            $fileUrl = $promoId->image;
        }

        $promoId->update([
            'image' => $fileUrl,
        ]);

        return redirect()->route('promo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promoId)
    {
        Storage::delete();
        $promoId->delete();
        return redirect()->route('promo.index');
    }
}
