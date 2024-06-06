<?php

namespace App\Http\Controllers;

use App\Models\BestProgram;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\Landing;
use App\Models\MasterTeacher;
use App\Models\MediaMassa;
use App\Models\Promo;
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
        $media = MediaMassa::all();
        $gallery = Gallery::all();
        $faq = FAQ::orderBy('sequence', 'asc')->get();
        $bestProgram = BestProgram::orderBy('seq', 'asc')->get();
        $promo = Promo::orderBy('seq', 'asc')->get();
        $teachers = MasterTeacher::all();

        return view('homepage.landing', [
            'jumbotron' => $jumbotron,
            'about' => $aboutSection,
            'program' => $programSection,
            'bestPrograms' => $bestProgram,
            'testimonials' => $testimonial,
            'faqs' => $faq,
            'sgs' => $sgsSection,
            'medias' => $media,
            'promos' => $promo,
            'galleries' => $gallery,
            'teachers' => $teachers,
        ]);
    }
}
