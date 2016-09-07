<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
  public $timestamps = false;
  protected $fillable = ['value'];

  public static function getRules()
  {
      return [
          'value' => 'required|digits_between:1,2',
      ];
  }

  public function tolerances()
  {
      return $hasMany('Tolerance');
  }

  public function fields()
  {
      return $this->hasManyThrough('Field', 'Tolerance');
  }

  public function ranges()
  {
      return $this->hasManyThrough('Range', 'Tolerance');
  }
}
