<?php

namespace App\Exports;

use App\Models\Personaje;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonajesExport implements FromCollection
{
    protected $personajes;

    public function __construct(array $personajes)
    {
        $this->personajes = $personajes;
    }

    public function collection()
    {
        // dd(collect($this->personajes));
        return collect($this->personajes);
    }
  
}

