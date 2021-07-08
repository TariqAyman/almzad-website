<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RefundAmountNotification extends Notification
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
        /// تم استردا مبلغ 10 قيمة رهن المزايده علي منتج 10
        /// لقد قام فاعل خير بالمزايدة علي المنتج 1
        return (new MailMessage)
            ->subject(trans('app.refund_amount'))
            ->greeting(trans('app.welcome'))
            ->line(trans('app.welcome'))
            ->line(trans('app.refund_amount_bid', ['value' => $this->wallet->hold, 'name' => $this->auction->name]))
            ->line(trans('app.someone_bid_in_this_product'))
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
