<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateOrderStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        // تغيير الحالة من shipping إلى shipped بعد 30 دقيقة
        $this->order->update(['status' => 'shipped']);

        // تحديد مدة التوصيل بناءً على خطة الشحن
        $delayHours = match ($this->order->shipping_plan) {
            'free' => 7,
            'standard' => 4,
            'express' => 1,
            default => 4,
        };

        // إنشاء Job آخر لتغيير الحالة إلى delivered بعد الوقت المحدد
        DeliverOrderJob::dispatch($this->order)->delay(now()->addHours($delayHours));
    }
}
