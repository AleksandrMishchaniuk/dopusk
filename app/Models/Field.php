<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Field
 *
 * @property int $id
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Quality[] $qualities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Range[] $ranges
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tolerance[] $tolerances
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Field whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Field whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Field whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Field whereValue($value)
 * @mixin \Eloquent
 */
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
      return $this->hasMany(Tolerance::class);
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
  public function qualities()
  {
      return $this->hasManyThrough(Quality::class, Tolerance::class);
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
  public function ranges()
  {
      return $this->hasManyThrough(Range::class, Tolerance::class);
  }
}
