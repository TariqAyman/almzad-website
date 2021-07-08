<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationNotification extends Notification
{
    use Queueable;

    private $donation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($donation)
    {
        $this->donation = $donation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /// شكرا ل تبرك بملبغ 10 ل مزاد الخير
        ///
        return (new MailMessage)
            ->subject(trans('app.donation'))
            ->greeting(trans('app.welcome'))
            ->line(trans('app.welcome'))
            ->line(trans('app.donation_action', ['value' => $this->donation->amount]))
            ->line(trans('app.thank_you_for_using_our_app'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
