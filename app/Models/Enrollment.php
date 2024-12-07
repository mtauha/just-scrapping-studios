<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'enrollment_type',
        'course_id',
        'booking_id',
        'competition_id',
        'training_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}