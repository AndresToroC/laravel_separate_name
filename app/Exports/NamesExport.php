<?php

namespace App\Exports;

use App\Helper\NameApi;
use App\Exports\Sheets;

// use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class NamesExport implements WithMultipleSheets
{
    // use Exportable;

    private $rows;

    public function __construct($rows = null) {
        $this->rows = $rows;
    }

    public function sheets(): array
    {
        $names = [];
        foreach ($this->rows as $key => $row) {
            $nameApi = new NameApi(implode("", $row));
            $response = $nameApi->names();

            $names[] = $response['name'];
        }

        $headding = ['Names', 'First name', 'Last name'];
        
        return [
            new Sheets($names, $headding, 'Names')
        ];
    }
}