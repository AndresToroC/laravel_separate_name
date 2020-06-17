<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Name;

class NamesImport implements ToModel
{
    public function model(array $row)
    {
        return new Name([
           'names' => $row['names']
        ]);
    }
}