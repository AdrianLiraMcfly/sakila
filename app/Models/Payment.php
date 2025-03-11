<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey='payment_id';
    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'staff_id',
        'rental_id',
        'amount',
        'payment_date',
    ];
}
