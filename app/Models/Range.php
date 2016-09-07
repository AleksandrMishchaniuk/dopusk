<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    public $timestamps = false;
    protected $fillable = ['min_val', 'max_val'];

    public static function getRules()
    {
        return [
            'min_val' => 'required|integer|between:1,2800',
            'max_val' => 'required|integer|between:3,3150|greater_than:min_val',
        ];
    }
    public static function getErrMsgs()
    {
        return [
            'greater_than' => 'Должно быть больше, чем "Минимальный размер"',
        ];
    }

    public function tolerances()
    {
        return $hasMany('Tolerance');
    }

    public function qualities()
    {
        return $this->hasManyThrough('Quality', 'Tolerance');
    }

    public function fields()
    {
        return $this->hasManyThrough('Field', 'Tolerance');
    }
}
