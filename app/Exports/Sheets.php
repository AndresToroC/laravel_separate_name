<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class sheets implements FromCollection, WithHeadings, WithTitle {
    private $names;
    private $heading;
    private $title;

    public function __construct($names = null, $heading = null, $title) {
        $this->names = $names;
        $this->heading = $heading;
        $this->title = $title;
    }

    public function collection()
    {        
        return collect($this->names);
    }

    public function headings(): array
    {
        return $this->heading;
    }

    public function title(): string
    {
        return $this->title;
    }
}