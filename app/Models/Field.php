<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
  const RULES = [
      'value' => 'required|max:2',
  ];
  public $timestamps = false;
  protected $fillable = ['value'];
}
