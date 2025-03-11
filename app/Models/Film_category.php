<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film_category extends Model
{
    protected $table = 'film_category';
    protected $primaryKey='film_id';
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'category_id',
    ];
}
