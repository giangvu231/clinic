<?php

namespace App\Exports;

use App\Supplies;
use Maatwebsite\Excel\Concerns\FromCollection;

class SupExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Supplies::all();
    }
}
