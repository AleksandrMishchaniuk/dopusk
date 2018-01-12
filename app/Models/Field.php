<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['value'];

    /**
     * @return array
     */
    public static function getRules()
    {
        return [
            'value' => 'required|max:2',
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
  public function ranges()
  {
      return $this->hasManyThrough('Range', 'Tolerance');
  }
}
