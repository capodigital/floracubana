<?php

namespace App\Exports;

use App\Models\Especies;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EspeciesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Especies::select("gen", "epit", "fam")->get();

    }

    public function headings(): array
    {
        return ["gen", "epit", "fam"];
    }
}
