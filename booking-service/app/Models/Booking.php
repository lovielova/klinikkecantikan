<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'treatment_id',
        'booking_date',
        'status',
        'payment_status',
        'total_price'
    ];
}
