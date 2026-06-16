<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f4ef;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 560px;
            margin: 30px auto;
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .header {
            background: #c44e02;
            padding: 28px 32px;
        }

        .header h2 {
            color: white;
            margin: 0;
            font-size: 20px;
        }

        .body {
            padding: 28px 32px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f0e8e0;
            font-size: 14px;
        }

        .label {
            color: #6b5a4e;
            font-weight: 600;
        }

        .value {
            color: #1a0a00;
        }

        .badge {
            background: #fff3e0;
            color: #c44e02;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .footer {
            background: #faf4ef;
            padding: 16px 32px;
            font-size: 12px;
            color: #6b5a4e;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h2>🏠 New Dormitory Booking Request</h2>
        </div>
        <div class="body">
            <p style="color:#6b5a4e;font-size:14px;margin-bottom:20px;">
                A new dormitory booking request has been submitted. Details below:
            </p>
            <div class="row"><span class="label">Full Name</span><span class="value">{{ $booking->full_name }}</span>
            </div>
            <div class="row"><span class="label">Phone</span><span class="value">{{ $booking->phone }}</span></div>
            <div class="row"><span class="label">Occupation</span><span
                    class="value">{{ $booking->occupation }}</span></div>
            <div class="row"><span class="label">Room Type</span><span
                    class="value">{{ $booking->room_type }}</span></div>
            <div class="row"><span class="label">Duration</span><span class="value">{{ $booking->duration }}</span>
            </div>
            <div class="row"><span class="label">Move-in Date</span><span
                    class="value">{{ \Carbon\Carbon::parse($booking->move_in_date)->format('d M, Y') }}</span></div>
            <div class="row" style="border:none;"><span class="label">Status</span><span
                    class="badge">{{ ucfirst($booking->status) }}</span></div>
        </div>
        <div class="footer">Vromonkonna © {{ date('Y') }} — This is an automated notification.</div>
    </div>
</body>

</html>
