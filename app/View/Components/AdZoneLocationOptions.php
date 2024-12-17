<?php

namespace App\View\Components;

use App\Enum\AdZoneLocation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdZoneLocationOptions extends Component
{
    public array $locations;

    public ?string $selectedLocation = null;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $selectedLocation = null)
    {
        $this->locations = AdZoneLocation::getValues();
        $this->selectedLocation = $selectedLocation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ad-zone-location-options');
    }
}
