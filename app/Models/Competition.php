<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'price',
        'image_url'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}