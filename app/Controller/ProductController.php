<?php

class ProductController
{
    public function index(): void
    {
        // Exemple simple sans BDD
        $products = [
            ['id' => 1, 'name' => 'Produit 1', 'price' => 10],
            ['id' => 2, 'name' => 'Produit 2', 'price' => 20],
        ];

        require __DIR__ . '/../../views/products/index.php';
    }

    public function show(array $params): void
    {
        $id = (int) ($params['id'] ?? 0);

        if ($id <= 0) {
            header('Location: /produits');
            exit;
        }

        // Simulation produit
        $product = [
            'id' => $id,
            'name' => 'Produit ' . $id,
            'price' => 10 * $id
        ];

        require __DIR__ . '/../../views/products/show.php';
    }
}
