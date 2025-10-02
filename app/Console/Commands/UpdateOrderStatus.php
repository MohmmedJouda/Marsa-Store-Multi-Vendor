<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class UpdateOrderStatus extends Command
{
    protected $signature = 'orders:update-status';
    protected $description = 'Update order statuses based on time rules';

    public function handle()
    {

        Order::where('status', 'pending')
            ->where('created_at', '<=', Carbon::now()->subHours(0))
            ->where('shipping_plan','express')
            ->update(['status' => 'shipping']);

        Order::where('status', 'shipping')
            ->where('created_at', '<=', Carbon::now()->subHours(1))
            ->where('shipping_plan','express')
            ->update(['status' => 'shipped']);

        Order::where('status', 'shipped')
            ->where('updated_at', '<=', Carbon::now()->subHours(3))
            ->where('shipping_plan','express')
            ->update(['status' => 'delivered']);


            

        Order::where('status', 'pending')
            ->where('created_at', '<=', Carbon::now()->subHours(0))
            ->where('shipping_plan','standard')
            ->update(['status' => 'shipping']);

        Order::where('status', 'shipping')
            ->where('created_at', '<=', Carbon::now()->subHours(3))
            ->where('shipping_plan','standard')
            ->update(['status' => 'shipped']);

        Order::where('status', 'shipped')
            ->where('updated_at', '<=', Carbon::now()->subHours(7))
            ->where('shipping_plan','standard')
            ->update(['status' => 'delivered']);






        Order::where('status', 'pending')
            ->where('created_at', '<=', Carbon::now()->subHours(0))
            ->where('shipping_plan','free')
            ->update(['status' => 'shipping']);

        Order::where('status', 'shipping')
            ->where('created_at', '<=', Carbon::now()->subHours(4))
            ->where('shipping_plan','free')
            ->update(['status' => 'shipped']);

        Order::where('status', 'shipped')
            ->where('updated_at', '<=', Carbon::now()->subHours(9   ))
            ->where('shipping_plan','free')
            ->update(['status' => 'delivered']);

        $this->info('Order statuses updated successfully!');
    }
}
