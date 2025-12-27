<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentalRequestConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $RentalRequest;

    public function __construct($RentalRequest)
    {
        $this->RentalRequest = $RentalRequest;
    }

    public function build()
    {
        return $this->subject('Rental Request Confirmation')
            ->html("
                <h2>Rental Request Confirmation</h2>
                <p>Thank you for your booking.</p>
                <p><strong>Request ID:</strong> {$this->RentalRequest->id}</p>
                <p><strong>Name:</strong> {$this->RentalRequest->name}</p>
                <p><strong>Phone:</strong> {$this->RentalRequest->phone}</p>
                <p><strong>Email:</strong> {$this->RentalRequest->email}</p>
                <p><strong>Total Amount:</strong> {$this->RentalRequest->total_price}</p>
                <p>We will contact you shortly.</p>
            ");
    }
}
