<?php

namespace App\Http\Controllers;

use App\Models\AccuracyProgram;
use App\Models\BestProgram;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\Landing;
use App\Models\MasterTeacher;
use App\Models\MediaMassa;
use App\Models\Promo;
use App\Models\Province;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SubPageController extends Controller
{
    public function program($program)
    {
        $program = BestProgram::where('slug', $program)->first();
        $sgsSection = Landing::where('namaSection', 'SGS')->first();
        $testimonial = Testimonial::all();
        $media = MediaMassa::all();
        $promo = Promo::orderBy('seq', 'asc')->get();
        $teacher = MasterTeacher::all();
        $akurasi = AccuracyProgram::orderBy('seq', 'asc')->get()->groupBy('sub');

        return view('sub-page.program', [
            'program' => $program,
            'sgs' => $sgsSection,
            'testimonials' => $testimonial,
            'medias' => $media,
            'promos' => $promo,
            'teachers' => $teacher,
            'benefits' => $akurasi,
        ]);
    }

    public function wilayah($wilayah)
    {
        $province = Province::where('slugCapitalCity', $wilayah)->with('regencies')->first();
        $aboutSection = Landing::where('namaSection', 'about')->first();
        $programSection = Landing::where('namaSection', 'Best Program')->first();
        $gallery = Gallery::all();
        $faq = FAQ::orderBy('sequence', 'asc')->get();
        $bestProgram = BestProgram::orderBy('seq', 'asc')->get();
        $sgsSection = Landing::where('namaSection', 'SGS')->first();
        $testimonial = Testimonial::all();
        $media = MediaMassa::all();
        $promo = Promo::orderBy('seq', 'asc')->get();
        $teacher = MasterTeacher::all();

        return view('sub-page.wilayah', [
            'province' => $province,
            'bestPrograms' => $bestProgram,
            'sgs' => $sgsSection,
            'testimonials' => $testimonial,
            'medias' => $media,
            'promos' => $promo,
            'teachers' => $teacher,
            'galleries' => $gallery,
            'faqs' => $faq,
            'about' => $aboutSection,
            'program' => $programSection
        ]);
    }
}
