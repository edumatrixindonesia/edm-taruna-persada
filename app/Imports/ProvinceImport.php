<?php

namespace App\Imports;

use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProvinceImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $province = Province::where('name', $row[0])->first();

            if ($province) {
                $province->update([
                    'name' => $row[0],
                    'slug' => Str::lower(Str::of($row[0])->replace(' ', '-', $row[0])),
                    'nameCapitalCity' => $row[1],
                    'slugCapitalCity' => Str::lower(Str::of($row[1])->replace(' ', '-', $row[1])),
                ]);
            } else {
                Province::create([
                    'name' => $row[0],
                    'slug' => Str::lower(Str::of($row[0])->replace(' ', '-', $row[0])),
                    'nameCapitalCity' => $row[1],
                    'slugCapitalCity' => Str::lower(Str::of($row[1])->replace(' ', '-', $row[1])),
                ]);
            }
        }
    }
}
