<?php

namespace App\Imports;

use App\Models\ZipCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZipCodesImport implements ToModel, WithHeadingRow
{
    /**
     * Define how each row should be mapped to the model.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ZipCode([
            'country'  => $row['country'],  // CSV heading must match
            'state'    => $row['state'],    // CSV heading must match
            'city'     => $row['city'],     // CSV heading must match
            'zip_code' => $row['zip_code'], // CSV heading must match
        ]);
    }
}
