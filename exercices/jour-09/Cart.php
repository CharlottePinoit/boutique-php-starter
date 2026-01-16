<?php

require_once 'CartItem.php';
require_once 'Product.php';

class Cart
{
    private array $items = [];

    // Ajoute un produit au panier
    public function add(Product $product, int $quantity = 1): self
    {
        foreach ($this->items as $item) {
            if ($item->getProduct() === $product) {
                $item->incremente($quantity);
                return $this;
            }
        }
        $this->items[] = new CartItem($product, $quantity);
        return $this;
    }

    // Supprime un produit du panier
    public function remove(Product $product): self
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProduct() === $product) {
                unset($this->items[$key]);
                $this->items = array_values($this->items); // réindexe
                return $this;
            }
        }
        return $this;
    }

    // Met à jour la quantité d’un produit
    public function update(Product $product, int $quantity): self
    {
        foreach ($this->items as $item) {
            if ($item->getProduct() === $product) {
                if ($quantity <= 0) {
                    $this->remove($product);
                } else {
                    $currentQty = $item->getQuantity();
                    if ($quantity > $currentQty) {
                        $item->incremente($quantity - $currentQty);
                    } elseif ($quantity < $currentQty) {
                        $item->decremente($currentQty - $quantity);
                    }
                }
                return $this;
            }
        }
        return $this;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    public function count(): int
    {
        $count = 0;
        foreach ($this->items as $item) {
            $count += $item->getQuantity();
        }
        return $count;
    }

    public function clear(): self
    {
        $this->items = [];
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
