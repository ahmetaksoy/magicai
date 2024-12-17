<?php

namespace App\Models;

use App\Enum\AdZoneLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $name
 * @property mixed $ad_client
 * @property mixed $ad_slot
 * @property mixed $location
 * @property mixed $full_width_responsive
 * @property mixed $id
 * @property int|mixed|string|null $created_by
 * @method static paginate(int $int)
 */
class AdZone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'ad_client',
        'ad_slot',
        'ad_format',
        'full_width_responsive',
        'location',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'location' => AdZoneLocation::class,
        'full_width_responsive' => 'boolean'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(AdZoneHistory::class, 'ad_zone_id', 'id');
    }
}
