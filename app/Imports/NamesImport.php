<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class NamesImport implements ToModel
{
    public function model(array $row)
    {
        return [
           'names' => $row['names']
        ];
    }
}