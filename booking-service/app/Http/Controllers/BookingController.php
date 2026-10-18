<?php
namespace App\Http\Controllers;
use App\Models\Booking;
use App\Jobs\SendBookingNotification;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        return response()->json(Booking::all());
    }

    public function store(Request $request) {
        $booking = Booking::create($request->all());
        // Publish ke RabbitMQ
        SendBookingNotification::dispatch([
            'booking_id' => $booking->id,
            'user_id' => $booking->user_id,
            'treatment_id' => $booking->treatment_id,
            'booking_date' => $booking->booking_date,
            'status' => $booking->status,
        ]);
        return response()->json($booking, 201);
    }

    public function show($id) {
        return response()->json(Booking::findOrFail($id));
    }

    public function updatePayment(Request $request, $id) {
        $booking = Booking::findOrFail($id);
        $booking->update(['payment_status' => 'paid', 'status' => 'confirmed']);
        return response()->json($booking);
    }
}
