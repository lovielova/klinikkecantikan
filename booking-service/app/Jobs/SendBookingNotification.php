<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBookingNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $bookingData;

    public function __construct($bookingData) {
        $this->bookingData = $bookingData;
        $this->onQueue('notifications');
    }

    public function handle() {
        // Notification service yang akan consume ini
    }
}
