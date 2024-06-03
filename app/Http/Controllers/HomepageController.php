<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Landing;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $jumbotron = Landing::where('namaSection', 'jumbotron')->first();
        $aboutSection = Landing::where('namaSection', 'about')->first();
        $programSection = Landing::where('namaSection', 'Best Program')->first();
        $sgsSection = Landing::where('namaSection', 'SGS')->first();
        $testimonial = Testimonial::all();
        $faq = FAQ::orderBy('sequence', 'asc')->get();

        return view('homepage.landing.index', [
            'jumbotron' => $jumbotron,
            'about' => $aboutSection,
            'program' => $programSection,
            'testimonials' => $testimonial,
            'faqs' => $faq,
            'sgs' => $sgsSection,
        ]);
    }
}
