<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapels = [
            [
                'name' => 'Wawasan Kebangsaan',
                'slug' => 'wawasan-kebangsaan',
            ],
            [
                'name' => 'Pengetahuan Umum',
                'slug' => 'pengetahuan-umum',
            ],
            [
                'name' => 'UU Kepolisian',
                'slug' => 'uu-kepolisian',
            ],
            [
                'name' => 'Penalaran Numerik',
                'slug' => 'penalaran-umum',
            ],
            [
                'name' => 'Penalaran Verbal',
                'slug' => 'penalaran-verbal',
            ],
            [
                'name' => 'Penalaran Logika',
                'slug' => 'penalaran-logika',
            ],
            [
                'name' => 'TPA Kuantitatif',
                'slug' => 'tpa-kuantitatif',
            ],
            [
                'name' => 'TPA Verbal',
                'slug' => 'tpa-verbal',
            ],
            [
                'name' => 'TPA Logika',
                'slug' => 'tpa-logika',
            ],
            [
                'name' => 'Psikotes',
                'slug' => 'psikotes',
            ],
            [
                'name' => 'Essay & Wawancara',
                'slug' => 'essay-dan-wawancara',
            ],
            [
                'name' => 'TKD Numerik',
                'slug' => 'tkd-numerik',
            ],
            [
                'name' => 'TKD Verbal',
                'slug' => 'tkd-verbal',
            ],
            [
                'name' => 'TKD Figural',
                'slug' => 'tkd-figural',
            ],
            [
                'name' => 'Learning Agility',
                'slug' => 'learning-agility',
            ],
            [
                'name' => 'Tes Intelegensi Umum',
                'slug' => 'tes-intelegensi-umum',
            ],
            [
                'name' => 'Tes Wawasan Kebangsaan',
                'slug' => 'tes-wawasan-kebangsaan',
            ],
            [
                'name' => 'Tes Karakteristik Pribadi',
                'slug' => 'tes-karakteristik-pribadi',
            ],
        ];

        foreach ($mapels as $key => $mapel) {
            Mapel::create($mapel);
        }
    }
}
