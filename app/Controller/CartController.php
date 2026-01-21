<?php

class CartController
{
    // GET /panier
    public function index(): void
    {
        $cart = $_SESSION['cart'] ?? [];
        require __DIR__ . '/../../views/cart/index.php';
    }

    // POST /panier/ajouter
    public function add(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);
        $quantity  = (int) ($_POST['quantity'] ?? 1);

        if ($productId > 0 && $quantity > 0) {
            if (!isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] = 0;
            }
            $_SESSION['cart'][$productId] += $quantity;
        }

        $this->redirect('/panier');
    }

    // POST /panier/supprimer
    public function remove(): void
    {
        $productId = (int) ($_POST['product_id'] ?? 0);

        if ($productId > 0 && isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        $this->redirect('/panier');
    }

    // POST /panier/modifier
    public function update(): void
    {
        foreach ($_POST['quantities'] ?? [] as $productId => $quantity) {
            $productId = (int) $productId;
            $quantity  = (int) $quantity;

            if ($quantity > 0) {
                $_SESSION['cart'][$productId] = $quantity;
            } else {
                unset($_SESSION['cart'][$productId]);
            }
        }

        $this->redirect('/panier');
    }

    private function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}
