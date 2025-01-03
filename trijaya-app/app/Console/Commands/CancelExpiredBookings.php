<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Booking;

class CancelExpiredBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:cancel-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel bookings that are 15 minutes past their booking time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $now = Carbon::now('Asia/Jakarta');
        $expiredBookings = Booking::where('status', 1)
        ->where('booking_time', '<=', $now->subMinutes(2)->toTimeString())
        ->whereDate('booking_date', '<=', $now->toDateString())
        ->get();

        foreach ($expiredBookings as $booking) {
            $booking->status = 4;
            $booking->save();
        }

        $this->info('Expired bookings have been canceled');
    }
}
