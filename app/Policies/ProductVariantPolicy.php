<?php

namespace App\Policies;

use App\Models\ProductVariant;
use App\Models\User;

class ProductVariantPolicy
{
    public function view(User $user, ProductVariant $productVariant): bool
    {
        return $user->role === 'vendor'
            && $user->store?->id === $productVariant->product?->store_id;
    }

    public function update(User $user, ProductVariant $productVariant): bool
    {
        return $this->view($user, $productVariant);
    }

    public function delete(User $user, ProductVariant $productVariant): bool
    {
        return $this->view($user, $productVariant);
    }
}
