<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Spatie\Permission\Models\Role;

class RolesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * Retourne tous les rôles
    */
    public function collection()
    {
        return Role::select( 'name', 'created_at','updated_at')->get();
    }

    /**
    * En-têtes du fichier Excel
    */
    public function headings(): array
    {
        return [
            'Nom du rôle',
            'Date de création',
            'Date de dernière MAJ',
        ];
    }

    /**
    * Formater les données avant export
    */
    public function map($role): array
    {
        return [
            $role->name,
            $role->created_at->format('d/m/Y H:i'),
            $role->updated_at->format('d/m/Y H:i'),
        ];
    }
}
