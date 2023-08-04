<?php

namespace App\Notifications;

use App\Notifications\Traits\SetDataForNotifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    use SetDataForNotifications;
    use Queueable;

    public $tries = 2;
    public $timeout = 10;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->subject = "New notification";
        $this->greeting = "Hello";
        $this->actionUrl = env("APP_URL");
        $this->actionText = env("APP_NAME");
        $this->methods = ['database'];
        $this->image = '';
        $this->actionUrl = env("APP_URL");
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return $this->methods;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->greeting($this->greeting)
            ->line($this->content)
            ->action($this->actionText, $this->actionUrl);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => '<a href="' . $this->actionUrl . '">' . $this->content . '</a>',
            'image' => $this->image,
        ];
    }
}
