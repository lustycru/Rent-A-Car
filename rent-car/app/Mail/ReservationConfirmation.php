<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $vehicleById;

    public function __construct($reservation, $vehicleById)
    {
        $this->reservation = $reservation;
        $this->vehicleById = $vehicleById;
    }

    public function build(): ReservationConfirmation
    {
        return $this->subject("Confirmation de votre réservation")
            ->view('reservation-confirmation');
    }
}
