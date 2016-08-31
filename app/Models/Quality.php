<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
  const RULES = [
      'value' => 'required|digits_between:1,2',
  ];
  public $timestamps = false;
  protected $fillable = ['value'];
}
