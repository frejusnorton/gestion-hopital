<?php

namespace App\Exports;

use App\Models\Profession;
use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServicesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Service::select('name','created_at','updated_at')->get(); 
    }

    public function headings(): array
    {
        return ["Nom de la profession","Date de création","Date de dernière MAJ"];
    }
}