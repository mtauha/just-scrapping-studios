<?php
namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class EnrollmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch course enrollments
        $courseEnrollments = Enrollment::where('user_id', $user->id)
            ->whereNotNull('course_id')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->select('courses.name as course_name', 'enrollments.created_at as enrollment_date', 'courses.start_date', 'courses.end_date')
            ->get();

        // Fetch training enrollments
        $trainingEnrollments = Enrollment::where('user_id', $user->id)
            ->whereNotNull('training_id')
            ->join('trainings', 'enrollments.training_id', '=', 'trainings.id')
            ->select('trainings.name as training_name', 'trainings.time', 'enrollments.created_at as enrollment_date')
            ->get();

        // Fetch competition enrollments
        $competitionEnrollments = Enrollment::where('user_id', $user->id)
            ->whereNotNull('competition_id')
            ->join('competitions', 'enrollments.competition_id', '=', 'competitions.id')
            ->select('competitions.name as competition_name', 'competitions.start_date', 'competitions.end_date', 'enrollments.created_at as enrollment_date')
            ->get();

        // Fetch bookings
        $bookings = Booking::where('user_id', $user->id)->get();

        return view('enrollments.index', compact('courseEnrollments', 'trainingEnrollments', 'competitionEnrollments', 'bookings'));
    }

    public function create()
    {
        return view('enrollments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users:id',
        ]);

        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('courses.index')->with('success', 'You have successfully enrolled in the course.');
    }

    public function show(Enrollment $enrollment)
    {
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        return view('enrollments.edit', compact('enrollment'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('courses.enrollments', $enrollment->course_id)->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('courses.enrollments', $enrollment->course_id)->with('success', 'Enrollment removed successfully.');
    }
}