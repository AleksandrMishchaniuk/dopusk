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

      $ids = [];

      $this->array = $this->getRangesArray($this->ranges, $ids);
      return $this->array;
  }

  protected function getRangesArray($ranges, $ids)
  {
      $array = [];
      foreach ($ranges as $range) {
          $ids['range'] = $range->id;
          $array["{$range->id}"] = [
              'id' => $range->id,
              'type' => 'range',
              'max' => $range->max_val,
              'min' => $range->min_val,
              'systems' => $this->getSystemsArray(Tolerance::SYSTEMS, $ids),
          ];
      }
      return $array;
  }

  protected function getSystemsArray($systems, $ids)
  {
      $array = [];
      foreach ($systems as $system) {
          $ids['system'] = $system;
          $array[$system] = [
              'type' => 'system',
              'title' => $system,
              'qualities' => $this->getQualitiesArray($this->qualities, $ids),
          ];
      }
      return $array;
  }

  protected function getQualitiesArray($qualities, $ids)
  {
      $array = [];
      foreach ($qualities as $quality) {
          $ids['quality'] = $quality->id;
          $array["{$quality->id}"] = [
              'id' => $quality->id,
              'type' => 'quality',
              'title' => $quality->value,
              'fields' => $this->getFieldsArray($this->fields, $ids),
          ];
      }
      return $array;
  }

  protected function getFieldsArray($fields, $ids)
  {
      $array = [];
      foreach ($fields as $field) {
          $ids['field'] = $field->id;
          $array["{$field->id}"] = [
              'id' => $field->id,
              'type' => 'quality',
              'title' => $field->value,
              'tolerance' => $this->getTolerance($this->tolerances, $ids),
          ];
      }
      return $array;
  }

  protected function getTolerance($tolerances, $ids)
  {
      $array = [];
      $tolerance = $tolerances
                    ->where('range_id', $ids['range'])
                    ->where('system', $ids['system'])
                    ->where( 'quality_id', $ids['quality'])
                    ->where( 'field_id', $ids['field'])
                    ->first();
      if ($tolerance) {
        $array = [
            'id' => $tolerance->id,
            'type' => 'tolerance',
            'max' => $tolerance->max_val,
            'min' => $tolerance->min_val,
        ];
      } else {
        $array = [
            'id' => NUll,
            'type' => 'tolerance',
            'max' => NUll,
            'min' => NUll,
        ];
      }
      return $array;
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
