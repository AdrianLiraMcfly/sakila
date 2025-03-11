<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film_actor extends Model
{
    protected $table = 'film_actor';
    protected $primaryKey='actor_id';
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'actor_id',
    ];
}
