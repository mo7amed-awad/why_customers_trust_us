<?php

namespace Modules\Notification\App\Notifications;

use Illuminate\Notifications\Notification;


abstract class BaseNotification extends Notification
{
    abstract public function getArTitle(): string;
    abstract public function getArBody(): string;

    abstract public function getEnTitle(): string;
    abstract public function getEnBody(): string;

    abstract public function getData(): array;

    public function toArray($notifiable): array
    {
        return [
            'title' => [
                'ar' => $this->getArTitle(),
                'en' => $this->getEnTitle(),
            ],
            'body' => [
                'ar' => $this->getArBody(),
                'en' => $this->getEnBody(),
            ],
            'data' => $this->getData(),
        ];
    }

    abstract public function via($notifiable): array;

    public function toDatabase($notifiable): array
    {
        return $this->toArray($notifiable);
    }
}
