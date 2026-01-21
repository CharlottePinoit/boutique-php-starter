<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use config\Database;

class CartController

{
    private ProductRepository $repository;

    public function __construct()
    {
        $pdo = Database::getInstance();
        $this->repository = new ProductRepository($pdo);
    }
    public function index(): void
    {

        view('cart/index', [
            'title' => 'Mon panier',
            'products' => $this->repository->findAll()
        ]);
    }

    public function add(): void
    {
        $id = $_POST['product_id'] ?? null;
        $qty = (int) ($_POST['quantity'] ?? 1);

        if ($id && $qty > 0) {
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $qty;
        }

        redirect('/panier');
    }

    public function remove(): void
    {
        $id = $_POST['product_id'] ?? null;
        if ($id) {
            unset($_SESSION['cart'][$id]);
        }
        redirect('/panier');
    }

    public function update(): void
    {
        foreach ($_POST['quantity'] ?? [] as $id => $qty) {
            if ($qty > 0) $_SESSION['cart'][$id] = (int)$qty;
            else unset($_SESSION['cart'][$id]);
        }
        redirect('/panier');
    }
}
