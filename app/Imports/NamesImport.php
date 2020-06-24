<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Name;

class NamesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Name([
           'names' => $row['names']
        ]);
    }
}