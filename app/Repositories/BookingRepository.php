<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    public function findByTranId(string $tranId): ?Booking
    {
        return Booking::where('tran_id', $tranId)->first();
    }

    public function updateStatus(string $tranId, string $status, array $extra = []): bool
    {
        return Booking::where('tran_id', $tranId)->update(array_merge(
            ['status' => $status],
            $extra
        ));
    }
}
