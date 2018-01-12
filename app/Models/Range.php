<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Range
 *
 * @property int $id
 * @property int $min_val
 * @property int $max_val
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Field[] $fields
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Quality[] $qualities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tolerance[] $tolerances
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Range whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Range whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Range whereMaxVal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Range whereMinVal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Range whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Range extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['min_val', 'max_val'];

    /**
     * @return array
     */
    public static function getRules()
    {
        return [
            'min_val' => 'required|integer|between:1,2800',
            'max_val' => 'required|integer|between:3,3150|greater_than:min_val',
        ];
    }

    /**
     * @return array
     */
    public static function getErrMsgs()
    {
        return [
            'greater_than' => 'Должно быть больше, чем "Минимальный размер"',
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
    public function fields()
    {
        return $this->hasManyThrough(Field::class, Tolerance::class);
    }
}
