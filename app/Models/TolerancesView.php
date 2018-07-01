<?php

namespace App\Models;

use App\Models\Tolerance;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TolerancesView
 * @package App\Models
 *
 * @property int $id
 * @property int $max_val
 * @property int $min_val
 * @property string $system
 * @property int $range_id
 * @property int $quality_id
 * @property int $field_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $max_size
 * @property int $min_size
 * @property string $quality
 * @property string $field
 * @method static Builder|Tolerance bySize($size)
 */
class TolerancesView extends Model
{
    protected $table = 'tolerances_view';

    /**
     * @param Builder $query
     * @param int|string $size
     * @return Builder
     */
    public function scopeBySize(Builder $query, $size)
    {
        $size = (int) $size;

        if ($size == 1) {
            $query->where('min_size', '<=', $size);
        } else {
            $query->where('min_size', '<', $size);
        }

        return $query->where('max_size', '>=', $size);
    }
}
