<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
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
          'value' => 'required|digits_between:1,2',
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
  public function fields()
  {
      return $this->hasManyThrough('Field', 'Tolerance');
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
  public function ranges()
  {
      return $this->hasManyThrough('Range', 'Tolerance');
  }
}
