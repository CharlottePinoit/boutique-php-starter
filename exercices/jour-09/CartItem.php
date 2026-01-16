<?php

require_once 'Product.php';

class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity = 1
    ) {
        $this->quantity = max(1, $this->quantity);
    }

    public function getTotal(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }

    public function incremente(int $amount = 1): void
    {
        if ($amount > 0) {
            $this->quantity += $amount;
        }
    }

    public function decremente(int $amount = 1): void
    {
        $this->quantity = max(1, $this->quantity - $amount);
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
}
