<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\User;
use App\Policies\OrderPolicy;
use Tests\TestCase;

class OrderPolicyTest extends TestCase
{
    private function user(int $id): User
    {
        $user = new User;
        $user->id = $id;

        return $user;
    }

    private function order(int $userId, ?string $status = null): Order
    {
        $order = new Order;
        $order->user_id = $userId;

        if ($status !== null) {
            $order->status = $status;
        }

        return $order;
    }

    public function test_customer_can_view_their_own_order(): void
    {
        $this->assertTrue((new OrderPolicy)->view(
            $this->user(1),
            $this->order(1),
        ));
    }

    public function test_customer_cannot_view_another_customers_order(): void
    {
        $this->assertFalse((new OrderPolicy)->view(
            $this->user(1),
            $this->order(2),
        ));
    }

    public function test_customer_cannot_pay_another_customers_order(): void
    {
        $this->assertFalse((new OrderPolicy)->pay(
            $this->user(1),
            $this->order(2, 'pending'),
        ));
    }

    public function test_customer_cannot_cancel_another_customers_order(): void
    {
        $this->assertFalse((new OrderPolicy)->cancel(
            $this->user(1),
            $this->order(2, 'pending'),
        ));
    }

    public function test_customer_cannot_refund_another_customers_order(): void
    {
        $this->assertFalse((new OrderPolicy)->refund(
            $this->user(1),
            $this->order(2, 'delivered'),
        ));
    }

    public function test_customer_can_pay_their_own_pending_order(): void
    {
        $this->assertTrue((new OrderPolicy)->pay(
            $this->user(1),
            $this->order(1, 'pending'),
        ));
    }

    public function test_customer_can_cancel_their_own_pending_order(): void
    {
        $this->assertTrue((new OrderPolicy)->cancel(
            $this->user(1),
            $this->order(1, 'pending'),
        ));
    }

    public function test_customer_can_refund_their_own_delivered_order(): void
    {
        $this->assertTrue((new OrderPolicy)->refund(
            $this->user(1),
            $this->order(1, 'delivered'),
        ));
    }
}
