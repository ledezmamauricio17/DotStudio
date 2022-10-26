<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'training_id',
        'status',
        'date',
    ];

    public $timestamps = false;
}
