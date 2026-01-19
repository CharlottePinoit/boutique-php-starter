<?php
require_once 'Category.php';

class Product
{
    public function __construct(
        private ?int $id,
        private string $name,
        private ?string $description,
        private float $price,
        private int $stock,
        private ?Category $category
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(?string $desc): void
    {
        $this->description = $desc;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }
    public function setCategory(?Category $cat): void
    {
        $this->category = $cat;
    }
}
