<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\SearchPaginate;

class Name extends Model
{
    use SearchPaginate;

    static $search_columns = ['names'];

    protected $fillable = [
        'names', 'first_name', 'last_name'
    ];
}
