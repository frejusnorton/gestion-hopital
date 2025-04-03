<?php

namespace App\Exports;

use App\Models\Profession;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProfessionsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Profession::select('name','created_at','updated_at')->get(); 
    }

    public function headings(): array
    {
        return ["Nom de la profession","Date de création","Date de dernière MAJ"];
    }
}