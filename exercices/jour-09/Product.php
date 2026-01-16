<?php

require_once 'Category.php';

class Product
{
    public function __construct(
        private string $name,
        private float $price,
        private int $stock,
        private Category $category
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
