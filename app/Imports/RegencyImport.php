<?php

namespace App\Imports;

use App\Models\Regency;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class RegencyImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $province = Province::where('name', $row[0])->first();
            $regency = Regency::where([['provinceId', '=', $province->id], ['name', '=', $row[1]]])->first();

            if ($regency) {
                $regency->update([
                    'name' => $row[1],
                    'slug' => Str::lower(Str::of($row[1])->replace(' ', '-', $row[1])),
                ]);
            } else {
                Regency::create([
                    'provinceId' => $province['id'],
                    'name' => $row[1],
                    'slug' => Str::lower(Str::of($row[1])->replace(' ', '-', $row[1])),
                ]);
            }
        }
    }
}
