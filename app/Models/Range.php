<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['min_val', 'max_val'];

    /**
     * @return array
     */
    public static function getRules()
    {
        return [
            'min_val' => 'required|integer|between:1,2800',
            'max_val' => 'required|integer|between:3,3150|greater_than:min_val',
        ];
    }

    /**
     * @return array
     */
    public static function getErrMsgs()
    {
        return [
            'greater_than' => 'Должно быть больше, чем "Минимальный размер"',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tolerances()
    {
        return $this->hasMany('Tolerance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function qualities()
    {
        return $this->hasManyThrough('Quality', 'Tolerance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function fields()
    {
        return $this->hasManyThrough('Field', 'Tolerance');
    }
}
