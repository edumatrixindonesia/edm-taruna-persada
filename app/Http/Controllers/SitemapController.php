<?php

namespace App\Http\Controllers;

use App\Models\BestProgram;
use App\Models\District;
use App\Models\Program;
use App\Models\Province;
use App\Models\Regency;
use App\Models\SubProgram;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $bestProgram = BestProgram::all();
        $program = Program::all();
        $subprogram = SubProgram::all();
        $paket = BestProgram::all();
        $province = Province::all();
        $regency = Regency::all();
        $district = District::all();
        $programPerKota = Program::with('regencies')->get()->groupBy('slug');
        $subProgramPerKota = SubProgram::with('regencies')->get()->groupBy('slug');

        return response()->view('sitemap.index', [
            'bestPrograms' => $bestProgram,
            'programs' => $program,
            'programRegencies' => $programPerKota,
            'subprograms' => $subprogram,
            'subProgramRegencies' => $subProgramPerKota,
            'paket' => $paket,
            'provinces' => $province,
            'regencies' => $regency,
            'districts' => $district,
        ])->header('Content-Type', 'text/xml');
    }

    public function sitemap()
    {
        return response()->view('sitemap')->header('Content-Type', 'text/xml');
    }
}
