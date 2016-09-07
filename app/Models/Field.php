<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
  public $timestamps = false;
  protected $fillable = ['value'];

  public static function getRules()
  {
      return [
          'value' => 'required|max:2',
      ];
  }

  public function tolerances()
  {
      return $this->hasMany('Tolerance');
  }

  public function qualities()
  {
      return $this->hasManyThrough('Quality', 'Tolerance');
  }

  public function ranges()
  {
      return $this->hasManyThrough('Range', 'Tolerance');
  }
}
