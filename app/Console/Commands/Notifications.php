<?php

namespace App\Console\Commands;

use App\Functions\PushNotification;
use Illuminate\Console\Command;
use Modules\Client\Entities\Model as Client;
use Modules\Notification\Entities\Model as Notification;

class Notifications extends Command
{
    protected $signature = 'notifications';

    protected $description = 'Send pending notifications';

    public function handle()
    {
        $notifications = Notification::where('done', 0)->take(10)->get();

        foreach ($notifications as $notification) {
            $lang = Client::where('id', $notification->client_id)->select('lang')->value('lang') ?? 'en';
            PushNotification::send([
                'title' => $notification->title(),
                'desc' => $notification->desc(),
                'image' => $notification->image ?? asset(setting('logo')),
                'type' => 'public',
                'client_id' => $notification->client_id,
            ]);

            $notification->update(['done' => 1]);
        }
    }
}
