<?php

namespace App\Mail;

use App\Models\DormBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DormBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public DormBooking $booking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Dormitory Booking Request — ' . $this->booking->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.dorm-booking',
        );
    }
}
