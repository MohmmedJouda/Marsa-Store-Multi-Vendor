<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentDecisionNotification extends Notification
{
    use Queueable;

    protected $order;
    protected $status; // 'approved' أو 'rejected'

    public function __construct($order, $status)
    {
        $this->order = $order;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $message = $this->status === 'approved' 
            ? 'تمت الموافقة على الدفع لطلبك رقم #' . $this->order->id 
            : 'تم رفض الدفع لطلبك رقم #' . $this->order->id;

        return (new MailMessage)
                    ->subject('قرار الدفع لطلبك')
                    ->greeting('مرحبًا ' . $this->order->user->name)
                    ->line($message)
                    ->action('عرض الطلب', url('/orders/' . $this->order->id))
                    ->line('شكرًا لاستخدامك متجرنا!');
    }

    public function toDatabase($notifiable)
    {
        $message = $this->status === 'approved' 
            ? 'تمت الموافقة على الدفع لطلبك رقم #' . $this->order->id 
            : 'تم رفض الدفع لطلبك رقم #' . $this->order->id;

        return [
            'order_id' => $this->order->id,
            'message' => $message,
        ];
    }
}
