<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tolerance
 *
 * @property int $id
 * @property float $max_val
 * @property float $min_val
 * @property string $system
 * @property int $range_id
 * @property int $quality_id
 * @property int $field_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Field $field
 * @property-read \App\Models\Quality $quality
 * @property-read \App\Models\Range $range
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance byField($field_id)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance byQuality($quality_id)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance byRange($range_id)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance bySystem($system)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereMaxVal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereMinVal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereQualityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereRangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tolerance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tolerance extends Model
{
    const SYSTEM_HOLE = 'hole';
    const SYSTEM_SHAFT = 'shaft';
    const SYSTEMS = [self::SYSTEM_HOLE, self::SYSTEM_SHAFT];

    /**
     * @var array
     */
    protected $fillable = ['system', 'max_val', 'min_val',
                          'range_id', 'quality_id', 'field_id'];

    /**
     * @return array
     */
    public static function getRules()
    {
        return [
            'system' => "required|in:".implode(',', self::SYSTEMS),
            'max_val' => 'nullable|numeric|greater_than:min_val',
            'min_val' => 'nullable|numeric',
            'range_id' => 'required',
            'quality_id' => 'required',
            'field_id' => 'required',
        ];
    }

    /**
     * @return array
     */
  public static function getErrMsgs()
  {
      return [
          'greater_than' => 'Должно быть больше, чем "Min"',
      ];
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  public function range()
  {
    return $this->belongsTo(Range::class);
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  public function quality()
  {
    return $this->belongsTo(Quality::class);
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  public function field()
  {
    return $this->belongsTo(Field::class);
  }

    /**
     * @param Builder $query
     * @param $range_id
     * @return Builder
     */
  public function scopeByRange(Builder $query, $range_id)
  {
      if ($range_id) {
          return $query->where('range_id', $range_id);
      }
      return $query;
  }

    /**
     * @param Builder $query
     * @param $quality_id
     * @return Builder
     */
  public function scopeByQuality(Builder $query, $quality_id)
  {
      if ($quality_id) {
          return $query->where('quality_id', $quality_id);
      }
      return $query;
  }

    /**
     * @param Builder $query
     * @param $field_id
     * @return Builder
     */
  public function scopeByField(Builder $query, $field_id)
  {
      if ($field_id) {
          return $query->where('field_id', $field_id);
      }
      return $query;
  }

    /**
     * @param Builder $query
     * @param $system
     * @return Builder
     */
  public function scopeBySystem(Builder $query, $system)
  {
      if ($system) {
          return $query->where('system', $system);
      }
      return $query;
  }
}
