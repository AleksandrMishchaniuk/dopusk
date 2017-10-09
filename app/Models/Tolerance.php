<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tolerance extends Model
{
  const SYSTEMS = ['hole', 'shaft'];

  public $timestamps = false;
  protected $fillable = ['system', 'max_val', 'min_val',
                          'range_id', 'quality_id', 'field_id'];

  public static function getRules()
  {
      return [
          'system' => "required|in:".implode(',', self::SYSTEMS),
          'max_val' => 'sometimes|numeric|greater_than:min_val',
          'min_val' => 'sometimes|numeric',
          'range_id' => 'required',
          'quality_id' => 'required',
          'field_id' => 'required',
      ];
  }
  public static function getErrMsgs()
  {
      return [
          'greater_than' => 'Должно быть больше, чем "Min"',
      ];
  }

  public function range()
  {
    return $this->belongsTo('Range');
  }

  public function quality()
  {
    return $this->belongsTo('Quality');
  }

  public function field()
  {
    return $this->belongsTo('Field');
  }

  public function scopeByRange($query, $range_id)
  {
      if ($range_id) {
          return $query->where('range_id', $range_id);
      }
      return $query;
  }

  public function scopeByQuality($query, $quality_id)
  {
      if ($quality_id) {
          return $query->where('quality_id', $quality_id);
      }
      return $query;
  }

  public function scopeByField($query, $field_id)
  {
      if ($field_id) {
          return $query->where('field_id', $field_id);
      }
      return $query;
  }

  public function scopeBySystem($query, $system)
  {
      if ($system) {
          return $query->where('system', $system);
      }
      return $query;
  }
}
