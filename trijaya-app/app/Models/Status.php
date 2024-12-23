<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $primaryKey = 'status_id';

    protected $fillable = [
        'status_name'
    ];

    public function bookings() {
        return $this->hasMany(Booking::class, 'status_id', 'status_id');
    }
}
