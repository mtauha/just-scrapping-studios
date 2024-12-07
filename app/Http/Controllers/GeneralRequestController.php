<?php
namespace App\Http\Controllers;

use App\Models\GeneralRequest;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class GeneralRequestController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'all');
        $generalRequests = GeneralRequest::with('user');

        switch ($category) {
            case 'course':
                $generalRequests = $generalRequests->with('course')->whereNotNull('course_id');
                break;
            case 'competition':
                $generalRequests = $generalRequests->with('competition')->whereNotNull('competition_id');
                break;
            case 'training':
                $generalRequests = $generalRequests->with('training')->whereNotNull('training_id');
                break;
            case 'booking':
                $generalRequests = $generalRequests->where('enrollment_type', 'booking');
                break;
        }

        $generalRequests = $generalRequests->get();

        return view('admin.general_requests', compact('generalRequests', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enrollment_type' => 'required|string',
            'course_id' => 'nullable|exists:courses,id',
            'competition_id' => 'nullable|exists:competitions,id',
            'training_id' => 'nullable|exists:trainings,id',
            'booking_type' => 'nullable|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
            'duration' => 'nullable|integer',
        ]);

        GeneralRequest::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'enrollment_type' => $request->enrollment_type,
            'course_id' => $request->course_id,
            'competition_id' => $request->competition_id,
            'training_id' => $request->training_id,
            'booking_type' => $request->booking_type,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
        ]);

        return redirect()->back()->with('success', 'Your request has been submitted.');
    }

    public function approve($id)
    {
        $request = GeneralRequest::findOrFail($id);

        switch ($request->enrollment_type) {
            case 'course':
                Enrollment::create([
                    'user_id' => $request->user_id,
                    'course_id' => $request->course_id,
                    'enrollment_type'=>$request->enrollment_type,
                ]);
                break;
            case 'booking':
                Booking::create([
                    'user_id' => $request->user_id,
                    'name' => $request->name,
                    'type' => $request->booking_type,
                    'date' => $request->date,
                    'time' => $request->time,
                    'duration' => $request->duration,
                ]);
                break;
            case 'competition':
                Enrollment::create([
                    'user_id' => $request->user_id,
                    'competition_id' => $request->competition_id,
                    'enrollment_type' => $request->enrollment_type,
                ]);
                break;
            case 'training':
                Enrollment::create([
                    'user_id' => $request->user_id,
                    'training_id' => $request->training_id,
                    'enrollment_type' => $request->enrollment_type,
                ]);
                break;
        }

        $request->delete();

        return redirect()->route('admin.general_requests.index')->with('success', 'Request approved.');
    }


    public function reject($id)
    {
        $request = GeneralRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('admin.general_requests.index')->with('success', 'Request rejected.');
    }
}