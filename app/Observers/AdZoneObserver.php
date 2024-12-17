<?php

namespace App\Observers;

use App\Models\AdZone;
use App\Models\AdZoneHistory;

class AdZoneObserver
{
    /**
     * @throws \Exception
     */
    public function creating(AdZone $adZone): void
    {
        $adZone->created_by = auth()->id() ?? throw new \Exception('User not authenticated.');
    }

    public function updating(AdZone $adZone): void
    {
        $originalAdZone = $adZone->getOriginal();

        $adZoneHistory = new AdZoneHistory();
        $adZoneHistory->ad_zone_id = $adZone->id;
        $adZoneHistory->user_id = auth()->id();
        $adZoneHistory->name = $originalAdZone['name'];
        $adZoneHistory->ad_client = $originalAdZone['ad_client'];
        $adZoneHistory->ad_slot = $originalAdZone['ad_slot'];
        $adZoneHistory->ad_format = $originalAdZone['ad_format'];
        $adZoneHistory->full_width_responsive = $originalAdZone['full_width_responsive'];
        $adZoneHistory->location = $originalAdZone['location'];

        $adZoneHistory->save();
    }

    public function saving(AdZone $adZone): void
    {
        $adZone->full_width_responsive = true;
    }
}
