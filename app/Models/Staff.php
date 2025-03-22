<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    
    protected $table = 'staff';
    protected $primaryKey='staff_id';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'address_id',
        'email',
        'store_id',
        'active',
        'username',
        'password',
        'role_id',
        'two_factor_code'
    ];

    protected $hidden = [
        'password',
        'two_factor_code',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
