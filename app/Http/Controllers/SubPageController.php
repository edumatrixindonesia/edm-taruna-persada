<?php

namespace App\Http\Controllers;

use App\Models\BestProgram;
use App\Models\Landing;
use App\Models\MasterTeacher;
use App\Models\MediaMassa;
use App\Models\Promo;
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

        return view('sub-page.program', [
            'program' => $program,
            'sgs' => $sgsSection,
            'testimonials' => $testimonial,
            'medias' => $media,
            'promos' => $promo,
            'teachers' => $teacher,
        ]);
    }
}
