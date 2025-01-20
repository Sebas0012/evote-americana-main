<?php

namespace App\Imports;

use App\Models\Votante;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VotantesImport implements ToCollection, WithHeadingRow
{
    use Importable;

    public function collection(Collection $rows)
    {
        // Votante::truncate();

        foreach ($rows as $row) {
            Votante::create([
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'identificacion' => $row['identificacion'],
                'email' => $row['email'],
                'telefono' => $row['telefono'],
            ]);
        }
    }
}
