<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'namaProgram' => 'TNI',
                'slug' => 'tni',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
