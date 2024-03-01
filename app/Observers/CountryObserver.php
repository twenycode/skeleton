<?php

namespace App\Observers;

use App\Models\Address;
use App\Models\Country;

class CountryObserver
{
    /**
     * Handle the Country "created" event.
     */
    public function created(Country $country): void
    {
        $address = new Address([
            'name' => $country->address,
            'longitude' => $country->longitude,
            'latitude' => $country->latitude,
        ]);
        $country->address()->save($address);
    }

    /**
     * Handle the Country "updated" event.
     */
    public function updated(Country $country): void
    {
        $country->address()->update([
            'name' => $country->address,
            'longitude' => $country->longitude,
            'latitude' => $country->latitude,
        ]);
    }

    /**
     * Handle the Country "deleted" event.
     */
    public function deleted(Country $country): void
    {
        $country->address()->delete();
    }

    /**
     * Handle the Country "restored" event.
     */
    public function restored(Country $country): void
    {
        //
    }

    /**
     * Handle the Country "force deleted" event.
     */
    public function forceDeleted(Country $country): void
    {
        //
    }

}
