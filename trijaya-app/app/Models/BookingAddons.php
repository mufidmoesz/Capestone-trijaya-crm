<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAddons extends Model
{
    use HasFactory;

    protected $table = 'booking_addons';

    protected $fillable = [
        'booking_id',
        'addon_id',
        'quantity'
    ];

    public function bookings() {
        return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
    }

    public function addons() {
        return $this->belongsTo(Addons::class, 'addon_id', 'addon_id');
    }
}
