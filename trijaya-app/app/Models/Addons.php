<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    use HasFactory;

    protected $table = 'add_ons';
    protected $primaryKey = 'addon_id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock'
    ];

    public function bookings() {
        return $this->belongsToMany(Booking::class, 'booking_addons', 'addon_id', 'booking_id')->using(BookingAddons::class);
    }
}
