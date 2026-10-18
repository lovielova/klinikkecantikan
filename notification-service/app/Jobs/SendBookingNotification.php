<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification;

class SendBookingNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $bookingData;

    public function __construct($bookingData) {
        $this->bookingData = $bookingData;
        $this->onQueue('notifications');
    }

    public function handle() {
        Notification::create([
            'user_id' => $this->bookingData['user_id'],
            'booking_id' => $this->bookingData['booking_id'],
            'message' => 'Booking dengan ID ' . $this->bookingData['booking_id'] . ' berhasil dibuat, status: ' . $this->bookingData['status'],
            'status' => 'sent',
        ]);
    }
}
