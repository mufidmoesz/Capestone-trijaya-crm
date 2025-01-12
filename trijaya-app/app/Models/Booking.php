<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'service_id',
        'customer_name',
        'customer_phone',
        'truck_number',
        'fuel_type',
        'booking_date',
        'booking_time',
        'estimated_total_price',
        'status'
    ];

    public function service() {
        return $this->belongsTo(Services::class, 'service_id', 'service_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status', 'status_id');
    }

    public function addons() {
        return $this->belongsToMany(Addons::class, 'booking_addons', 'booking_id', 'addon_id')->using(BookingAddons::class);
    }

    public function feedback() {
        return $this->hasOne(Feedback::class, 'booking_id', 'booking_id');
    }
}
