<?php

namespace App\Imports;

use App\Models\Especies;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class EspeciesImport implements ToModel,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Especies([
            'gen'     => $row['gen'],
            'epit'    => $row['epit'],
            'fam'    => $row['fam'],
            'id_origen'    => 1,

        ]);
    }
}
