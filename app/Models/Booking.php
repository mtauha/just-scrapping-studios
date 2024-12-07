<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'date',
        'time',
        'duration',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}