<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'enrollment_type',
        'course_id',
        'competition_id',
        'training_id',
        'booking_type',
        'name',
        'email',
        'phone',
        'date',
        'time',
        'duration',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
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