<?php

namespace Modules\Notification\App\Notifications;



class NewOrderNotification extends BaseNotification
{

    public function getArTitle(): string
    {
        return "طلب جديد";
    }

    public function getArBody(): string
    {
        return "تم استلام طلب جديد رقم #{4}";
    }

    public function getEnTitle(): string
    {
        return "New Order";
    }

    public function getEnBody(): string
    {
        return "You have a new order #{4}";
    }

    public function getData(): array
    {
        return ['order_id' => 4];
    }

    public function via($notifiable): array
    {
        return ['database'];
    }
}

