<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film_text extends Model
{
    protected $table = 'film_text';
    protected $primaryKey='film_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
    ];
}
