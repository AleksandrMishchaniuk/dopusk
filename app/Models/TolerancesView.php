<?php

namespace App\Models;

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
 */
class TolerancesView extends Model
{
    protected $table = 'tolerances_view';
}
