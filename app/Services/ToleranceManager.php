<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Tolerance;
use App\Models\Range;
use App\Models\Field;
use App\Models\Quality;

/**
 *
 */
class ToleranceManager
{

  protected $ranges;
  protected $qualities;
  protected $fields;
  protected $tolerances;
  protected $array;

  function __construct()
  {
      $this->array = [];
  }

  public function getArray()
  {
      if(count($this->array)) { return $this->array; }
      $this->fillRanges();
      $this->fillQualities();
      $this->fillFields();
      $this->fillTolerances();
      foreach ($this->ranges as $range_obj) {
        $range = $this->getRangeKey($range_obj);
        $this->array[$range] = [];
        foreach (Tolerance::SYSTEMS as $system) {
          $this->array[$range][$system] = [];
          foreach ($this->qualities as $quality_obj) {
            $quality = $quality_obj->value;
            $this->array[$range][$system][$quality] = [];
            foreach ($this->fields as $field_obj) {
              $field = $field_obj->value;
              $tolerance = $this->tolerances
                                ->where('range_id', $range_obj->id)
                                ->where('system', $system)
                                ->where( 'quality_id', $quality_obj->id)
                                ->where( 'field_id', $field_obj->id)
                                ->first();
              if ($tolerance) {
                $this->array[$range][$system][$quality][$field] = [
                  'max' => $tolerance->$max_val,
                  'min' => $tolerance->$min_val,
                ];
              } else {
                // $this->array[$range][$system][$quality][$field] = NUll;
                $this->array[$range][$system][$quality][$field] = [
                  'max' => NUll,
                  'min' => NUll,
                ];
              }
            }
          }
        }
      }
      return $this->array;
  }

  protected function getRangeKey(Range $range)
  {
      return "{$range->min_val}_{$range->max_val}";
  }

  protected function fillRanges()
  {
      if(!$this->ranges){
          $this->ranges = Range::all();
      }
  }
  protected function fillQualities()
  {
      if(!$this->qualities){
          $this->qualities = Quality::all();
      }
  }
  protected function fillFields()
  {
      if(!$this->fields){
          $this->fields = Field::all();
      }
  }
  protected function fillTolerances()
  {
      if(!$this->tolerances){
          $this->tolerances = Tolerance::all();
      }
  }
}
