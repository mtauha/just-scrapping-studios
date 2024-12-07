<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|integer',
        ]);

        $data = $request->all();
        $data['price'] = 0; // Set default price to 0

        Booking::create($data);

        return redirect()->route('bookings.index');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|integer',
        ]);

        $data = $request->all();
        $data['price'] = $data['price'] ?? 0; // Ensure price is set to 0 if not provided

        $booking->update($data);

        return redirect()->route('bookings.index');
    }


    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index');
    }
}