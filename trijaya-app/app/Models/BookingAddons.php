<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookingAddons extends Pivot
{
    use HasFactory;

    protected $table = 'booking_addons';

    protected $fillable = [
        'booking_id',
        'addon_id',
    ];

    public function bookings() {
        return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
    }

    public function addons() {
        return $this->belongsTo(Addons::class, 'addon_id', 'addon_id');
    }
}
