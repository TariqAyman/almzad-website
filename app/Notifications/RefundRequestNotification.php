<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RefundRequestNotification extends Notification
{
    use Queueable;

    private $refundRequest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($refundRequest)
    {
        $this->refundRequest = $refundRequest;
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
        /// تم ارسال طلب استراد مبلغ 10 وفي انتظارتوصل الادارة في اقرب وقت
        ///
        return (new MailMessage)
            ->subject(trans('app.thank_you_for_refund_request'))
            ->greeting(trans('app.welcome'))
            ->line(trans('app.you_apply_refund_request', ['value' => $this->refundRequest->amount]))
            ->line(trans('app.waiting_admin_approve'))
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
