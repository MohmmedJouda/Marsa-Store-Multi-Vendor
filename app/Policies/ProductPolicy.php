<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role === 'vendor';
    }

    public function view(User $user, Product $product): bool
    {
        return $user->role === 'vendor'
            && $user->store?->id === $product->store_id;
    }

    public function create(User $user): bool
    {
        return $user->role === 'vendor' && $user->store !== null;
    }

    public function update(User $user, Product $product): bool
    {
        return $user->role === 'vendor'
            && $user->store?->id === $product->store_id;
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->role === 'vendor'
            && $user->store?->id === $product->store_id;
    }

    public function restore(User $user, Product $product): bool
    {
        return $this->delete($user, $product);
    }

    public function forceDelete(User $user, Product $product): bool
    {
        return $this->delete($user, $product);
    }
}
