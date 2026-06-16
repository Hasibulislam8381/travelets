<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\DormBooking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class DormBookingController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $data = DormBooking::latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    // Status onujayi badge system dynamic render
                    if ($row->status == 'pending') {
                        return '<span class="badge bg-warning text-dark text-capitalize">' . $row->status . '</span>';
                    } elseif ($row->status == 'approved') {
                        return '<span class="badge bg-success text-capitalize">' . $row->status . '</span>';
                    } else {
                        return '<span class="badge bg-danger text-capitalize">' . $row->status . '</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    // Dynamic configuration conditional check for simple visibility
                    $approveBtn = $data->status !== 'approved' ? '<button onclick="changeStatus(' . $data->id . ', \'approved\')" class="btn btn-success btn-sm">Approve</button>' : '';
                    $rejectBtn = $data->status !== 'rejected' ? '<button onclick="changeStatus(' . $data->id . ', \'rejected\')" class="btn btn-danger btn-sm">Reject</button>' : '';

                    return '
                        <div class="btn-group btn-group-sm">
                            ' . $approveBtn . '
                            ' . $rejectBtn . '
                        </div>
                    ';
                })
                ->rawColumns(['status', 'action']) // Ekbare shob column raw explicit render kora holo
                ->make(true);
        }

        return view('backend.layouts.dorm_booking.index');
    }

    public function updateStatus(Request $request, int $id): JsonResponse
    {
        $booking = DormBooking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Status changed to ' . ucfirst($request->status) . ' successfully.',
        ]);
    }
}
