<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDeviceLoginNotification extends Notification
{
    use Queueable;

    protected $ip;
    protected $userAgent;
    protected $ipLocation;
   
    
    /**
     * Create a new notification instance.
     */
    public function __construct($ip, $userAgent, $ipLocation)
    {
        $this->ip = $ip;
        $this->userAgent = $userAgent;
        $this->ipLocation = $ipLocation;
       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    
                    ->subject('New Device Login Notification')
                    ->line('There has been a login from a new device/browser to your account.')
                    ->line('IP Address: ' . $this->ip)
                    ->line('User Agent: ' . $this->userAgent)
                    ->line('Location: ' . $this->ipLocation)
                    ->action('Log in', url('/pages'))
                    ->line('If this was not you, please contact support immediately.');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}