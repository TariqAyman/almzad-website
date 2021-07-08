<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeductBalanceNotification extends Notification
{
    use Queueable;

    private $wallet;
    private $auction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($wallet, $auction)
    {
        $this->wallet = $wallet;
        $this->auction = $auction;
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
        ///شكرا لستفصحم موقع مزادالخير
        /// تم خصم مبلغ : 10 من المحفطة لميزادتك علي المنتج 1
        /// وشكرا
        ///
        return (new MailMessage)
            ->subject(trans('app.deduct_balance'))
            ->greeting(trans('app.welcome'))
            ->line(trans('app.welcome'))
            ->line(trans('app.deduct_balance_bid', ['value' => $this->wallet->hold, 'name' => $this->auction->name]))
            ->action(trans('app.link'), route('frontend.auctions.show', $this->auction->slug))
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
