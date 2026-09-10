<?php

namespace App\Http\Controllers;

use App\Models\Trip;

abstract class Controller
{
    /**
     * Pastikan $trip (atau data anak trip seperti Budget/Checklist/Itinerary/
     * Photo/PriceComparison lewat relasi ->trip) memang milik user yang login,
     * atau user itu admin. Cegah orang lain akses/edit/hapus data trip orang
     * lain cuma dengan menebak ID di URL.
     */
    protected function authorizeTripOwner(Trip $trip): void
    {
        abort_unless(
            $trip->user_id === auth()->id() || auth()->user()?->is_admin,
            403,
            'Kamu tidak punya akses ke data ini.'
        );
    }
}
