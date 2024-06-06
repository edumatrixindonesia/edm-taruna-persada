<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::orderby('sequence', 'asc')->get();
        return view('admin.faq.index', [
            'faqs' => $faqs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
            'sequence' => ['required'],
        ]);

        FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'sequence' => $request->sequence,
        ]);

        return redirect()->route('faq.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $faqId)
    {
        return view('admin.faq.edit', [
            'faq' => $faqId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $faqId)
    {
        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
            'sequence' => ['required'],
        ]);

        $faqId->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'sequence' => $request->sequence,
        ]);

        return redirect()->route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $faqId)
    {
        $faqId->delete();
        return redirect()->route('faq.index');
    }
}
