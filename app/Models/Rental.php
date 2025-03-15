<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'rental';
    protected $primaryKey='rental_id';
    public $timestamps = false;

    protected $fillable = [
        'rental_id',
        'rental_date',
        'inventory_id',
        'customer_id',
        'return_date',
        'staff_id',
        'last_update',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Relación con el modelo Film (un alquiler tiene una película).
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
