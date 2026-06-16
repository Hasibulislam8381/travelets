<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\DormBookingMail;
use App\Models\DormBooking;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DormBookingController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'full_name'    => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'occupation'   => 'required|string|max:100',
            'room_type'    => 'required|string|max:100',
            'duration'     => 'required|string|max:50',
            'move_in_date' => 'required|date|after_or_equal:today',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $booking = DormBooking::create([
                'full_name'    => $request->full_name,
                'phone'        => $request->phone,
                'occupation'   => $request->occupation,
                'room_type'    => $request->room_type,
                'duration'     => $request->duration,
                'move_in_date' => $request->move_in_date,
                'status'       => 'pending',
            ]);

            // Send email to admin
            Mail::to(config('mail.admin_email', 'admin@vromonkonna.com'))
                ->send(new DormBookingMail($booking));

            return redirect()->back()->with('dorm-success', 'Your booking request has been submitted successfully! We will contact you soon.');
        } catch (Exception $e) {
            return redirect()->back()->with('dorm-error', 'Something went wrong. Please try again.')->withInput();
        }
    }
}
