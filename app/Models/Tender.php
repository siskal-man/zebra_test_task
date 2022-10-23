<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    use Filterable;

    public $timestamps = false;

    protected $fillable = [
        'outer_code',
        'number',
        'status',
        'name',
        'date_change'
    ];


}
