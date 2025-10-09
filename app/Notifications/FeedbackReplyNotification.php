<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Feedback;

class FeedbackReplyNotification extends Notification
{
    use Queueable;

    public $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function via($notifiable)
    {
        return ['database']; // أو ['mail', 'database'] إذا تريد أيضًا بريد
    }

    public function toDatabase($notifiable)
    {
        return [
            'feedback_id' => $this->feedback->id,
            'message' => 'تم الرد على ملاحظتك من قبل الإدارة.',
            'reply' => $this->feedback->admin_response, // 🟢 هذا هو الرد الذي سيتخزن
            'created_at' => now(),
        ];
    }

    // (اختياري) إذا كنت تريد أيضًا إرسال إيميل
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('تم الرد على ملاحظتك')
                    ->line('الرد من الإدارة:')
                    ->line($this->feedback->admin_response)
                    ->action('عرض الملاحظة', url('/feedbacks/'.$this->feedback->id));
    }
}
