<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name',
        'service_description',
        'service_price',
        'estimated_time'
    ];

    public function bookings() {
        return $this->hasMany(Booking::class, 'service_id', 'service_id');
    }
}
