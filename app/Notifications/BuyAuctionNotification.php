<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BuyAuctionNotification extends Notification
{
    use Queueable;

    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(trans('app.thank_you_for_buy_auction'))
            ->greeting(trans('app.welcome'))
            ->line(trans('app.name') . ": {$this->details['auction']['name']}")
            ->line(trans('app.description') . ": {$this->details['auction']['description']}")
            ->line(trans('app.conditions') . ": {$this->details['auction']['conditions']}")
            ->line(trans('app.shipping_conditions') . ": {$this->details['auction']['shipping_conditions']}")
            ->line(trans('app.start_from') . ": {$this->details['auction']['start_from']}")
            ->line(trans('app.purchase_price') . ": {$this->details['auction']['purchase_price']}")
            ->line(trans('app.sale_amount') . ": {$this->details['auction']['sale_amount']}")
            ->line(trans('app.start_date') . ": {$this->details['auction']['start_date']->format('Y/m/d H:s a')}")
            ->line(trans('app.end_date') . ": {$this->details['auction']['end_date']->format('Y/m/d H:s a')}")
            ->line(trans('app.Is shipping available?') . ': ' . ($this->details['auction']['shipping'] ? trans('app.yes') : trans('app.no')))
            ->line(trans('app.shipping_free') . ': ' . ($this->details['auction']['shipping_free'] ? trans('app.yes') : trans('app.no')))
            ->line(trans('app.multi_auction') . ': ' . ($this->details['auction']['multi_auction'] ? trans('app.yes') : trans('app.no')))
            ->action(trans('app.url'), $this->details['url'])
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
        return $this->details;
    }
}
