<?php
// app/Services/BookingService.php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class BookingService
{
    public function createBooking(array $data): string
    {
        try {
            Log::info('Starting booking creation', ['data' => $data]);

            $result = DB::transaction(function () use ($data) {
                Log::debug('Executing database transaction');

                $result = DB::select(
                    "DECLARE @ref VARCHAR(255);
                     EXEC CreateBooking 
                        @check_in_date = ?, 
                        @check_out_date = ?, 
                        @check_in_time = ?, 
                        @check_out_time = ?, 
                        @guest_id = ?, 
                        @room_id = ?,
                        @booking_reference = @ref OUTPUT;
                     SELECT @ref AS booking_reference;",
                    [
                        $data['check_in_date'],
                        $data['check_out_date'],
                        $data['check_in_time'],
                        $data['check_out_time'],
                        $data['guest_id'],
                        $data['room_id']
                    ]
                );

                Log::debug('Stored procedure executed', ['result' => $result]);
                return $result[0]->booking_reference;
            });

            Log::info('Booking created successfully', ['reference' => $result]);
            return $result;

        } catch (\Exception $e) {
            Log::error('Booking failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    public function updateBookingStatus(string $bookingReference, string $newStatus): void
    {
        DB::select("EXEC UpdateBookingStatus ?, ?", [
            $bookingReference,
            $newStatus
        ]);
    }
}