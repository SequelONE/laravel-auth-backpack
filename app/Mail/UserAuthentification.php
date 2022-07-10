<?php

namespace App\Mail;

use App\Models\Session;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class UserAuthentification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $geoip = geoip()->getLocation(request()->ip());

        return $this->view('mail.auth')
            ->with([
                'ip' => $geoip->ip,
                'iso_code' => $geoip->iso_code,
                'country' => $geoip->country,
                'city' => $geoip->city,
                'state' => $geoip->state,
                'state_name' => $geoip->state_name,
                'postal_code' => $geoip->postal_code,
                'lat' => $geoip->lat,
                'lon' => $geoip->lon,
                'timezone' => $geoip->timezone,
                'continent' => $geoip->continent,
                'currency' => $geoip->currency,
                'default' => $geoip->id
            ]);
    }
}
