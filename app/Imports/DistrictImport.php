<?php

namespace App\Imports;

use App\Models\Regency;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DistrictImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $regency = Regency::where('name', $row[0])->first();
            $district = District::where([['regencyId', '=', $regency->id], ['name', '=', $row[1]]])->first();

            if ($district) {
                $district->update([
                    'name' => $row[1],
                    'slug' => Str::lower(Str::of($row[1])->replace(' ', '-', $row[1])),
                ]);
            } else {
                District::create([
                    'regencyId' => $regency['id'],
                    'name' => $row[1],
                    'slug' => Str::lower(Str::of($row[1])->replace(' ', '-', $row[1])),
                ]);
            }
        }
    }
}
