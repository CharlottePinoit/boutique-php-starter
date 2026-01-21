<?php

class ProductRepository
{
    private array $products;

    public function __construct()
    {
        // Exemple de produits en dur
        $this->products = [
            1 => ['id' => 1, 'name' => 'Produit A', 'price' => 10],
            2 => ['id' => 2, 'name' => 'Produit B', 'price' => 20],
            3 => ['id' => 3, 'name' => 'Produit C', 'price' => 30],
        ];
    }

    public function findAll(): array
    {
        return $this->products;
    }

    public function find(int $id): ?array
    {
        return $this->products[$id] ?? null;
    }
}
