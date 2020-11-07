<?php

namespace App\Exports;

use App\Models\BookMark;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookMarksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BookMark::all();
    }
}
