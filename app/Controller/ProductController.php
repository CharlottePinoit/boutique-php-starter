<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use config\Database;

class ProductController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $pdo = Database::getInstance();
        $this->repository = new ProductRepository($pdo);
    }

    public function index(): void
    {
        view('products/index', [
            'title' => 'Nos produits',
            'products' => $this->repository->findAll()
        ]);
    }




    public function show(string $id): void
    {
        /*if (!$id) {
            header('Location: /produits');
            exit;
        }*/

        $product = $this->repository->find((int)$id);

        if (!$product) {
            http_response_code(404);
            //require __DIR__ . '/../../views/errors/404.php';
            view('/products/404', [
                'title' => 'page introuvable',
            ]);
            exit;
        }

        //require __DIR__ . '/../../views/products/show.php';
        view('/products/show', [
            'title' => e($product->getName()),
            'product' => $product
        ]);
    }
}
