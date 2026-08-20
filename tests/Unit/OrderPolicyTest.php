<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\User;
use App\Policies\OrderPolicy;
use Tests\TestCase;

class OrderPolicyTest extends TestCase
{
    public function test_customer_can_view_their_own_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 1]);

        $this->assertTrue((new OrderPolicy)->view($user, $order));
    }

    public function test_customer_cannot_view_another_customers_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 2]);

        $this->assertFalse((new OrderPolicy)->view($user, $order));
    }

    public function test_customer_cannot_pay_another_customers_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 2, 'status' => 'pending']);

        $this->assertFalse((new OrderPolicy)->pay($user, $order));
    }

    public function test_customer_cannot_cancel_another_customers_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 2, 'status' => 'pending']);

        $this->assertFalse((new OrderPolicy)->cancel($user, $order));
    }

    public function test_customer_cannot_refund_another_customers_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 2, 'status' => 'delivered']);

        $this->assertFalse((new OrderPolicy)->refund($user, $order));
    }

    public function test_customer_can_pay_their_own_pending_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 1, 'status' => 'pending']);

        $this->assertTrue((new OrderPolicy)->pay($user, $order));
    }

    public function test_customer_can_cancel_their_own_pending_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 1, 'status' => 'pending']);

        $this->assertTrue((new OrderPolicy)->cancel($user, $order));
    }

    public function test_customer_can_refund_their_own_delivered_order(): void
    {
        $user = new User(['id' => 1]);
        $order = new Order(['user_id' => 1, 'status' => 'delivered']);

        $this->assertTrue((new OrderPolicy)->refund($user, $order));
    }
}
