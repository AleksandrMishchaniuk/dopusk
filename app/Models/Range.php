<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    const RULES = [
        'min_val' => 'required|integer|between:1,2800',
        'max_val' => 'required|integer|between:3,3150|greater_than:min_val',
    ];
    const MSGS = [
        'greater_than' => 'Должно быть больше, чем "Минимальный размер"',
    ];
    public $timestamps = false;
    protected $fillable = ['min_val', 'max_val'];
}
