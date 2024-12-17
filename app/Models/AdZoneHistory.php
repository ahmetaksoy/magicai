<?php

namespace App\Models;

use App\Enum\AdZoneLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $ad_zone_id
 * @property int|mixed|string|null $user_id
 * @property mixed $name
 * @property mixed $ad_client
 * @property mixed $ad_slot
 * @property mixed $ad_format
 * @property mixed $full_width_responsive
 * @property mixed $location
 */
class AdZoneHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_zone_id',
        'user_id',
        'name',
        'ad_client',
        'ad_slot',
        'ad_format',
        'location',
        'full_width_responsive'
    ];

    protected $casts = [
        'full_width_responsive' => 'boolean',
        'location' => AdZoneLocation::class,
    ];
}
