<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'price',
        'type',
        'image_url'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}