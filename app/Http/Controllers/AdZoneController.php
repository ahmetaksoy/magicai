<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdZoneRequest;
use App\Http\Requests\UpdateAdZoneRequest;
use App\Models\AdZone;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class AdZoneController extends Controller
{
    public function index(): Factory|Application|View|ApplicationContract
    {
        $adZones = AdZone::with('creator', 'updater')->paginate(10);
        return view('panel.admin.frontend.ad_zones.index', compact('adZones'));
    }

    public function show(AdZone $adZone): Factory|Application|View|ApplicationContract
    {
        return view('panel.admin.frontend.ad_zones.show', compact('adZone'));
    }

    public function create(): Factory|Application|View|ApplicationContract
    {
        return view('panel.admin.frontend.ad_zones.create');
    }

    public function store(StoreAdZoneRequest $request, AdZone $adZone): RedirectResponse
    {
        $adZone->name = $request->name;
        $adZone->ad_client = $request->ad_client;
        $adZone->ad_slot = $request->ad_slot;
        $adZone->location = $request->location;
        $adZone->full_width_responsive = $request->full_width_responsive;

        $adZone->save();

        return redirect()->route('dashboard.admin.frontend.adZone.index')->with('success', __('AdZone created successfully.'));

    }

    public function update(UpdateAdZoneRequest $request, AdZone $adZone): RedirectResponse
    {
        $adZone->name = $request->input('name', $adZone->name);
        $adZone->ad_client = $request->input('ad_client', $adZone->ad_client);
        $adZone->ad_slot = $request->input('ad_slot', $adZone->ad_slot);
        $adZone->location = $request->input('location', $adZone->location);
        $adZone->full_width_responsive = $request->boolean('full_width_responsive', $adZone->full_width_responsive);

        $adZone->save();

        return redirect()->route('dashboard.admin.frontend.adZone.show', $adZone)->with('success', __('AdZone updated successfully.'));
    }

    public function destroy(AdZone $adZone): RedirectResponse
    {
        $adZone->delete();

        return redirect()->route('dashboard.admin.frontend.adZone.index')->with('success', __('AdZone deleted successfully.'));
    }
}
