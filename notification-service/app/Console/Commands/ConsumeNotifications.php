<?php
namespace App\Console\Commands;
use App\Models\Notification;
use Illuminate\Console\Command;

class ConsumeNotifications extends Command
{
    protected $signature = 'notifications:consume';
    protected $description = 'Consume booking notifications from RabbitMQ';

    public function handle() {
        $this->info('Listening for notifications...');
        // Worker akan jalan otomatis via queue:work
    }
}
