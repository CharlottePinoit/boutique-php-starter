<?php

//classe Category
class Category
{
    public function __construct(private string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

//Classe Product
class Product
{
    public function __construct(private string $name, private float $price, private int $stock, private $category)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->category = $category;
    }

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

//Classe CartItem
class CartItem
{
    public function __construct(private $product, private $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity > 0 ? $quantity : 1;
    }

    public function getTotal()
    {
        return $this->product->getPrice() * $this->quantity;
    }

    public function incremente($amount = 1)
    {
        $this->quantity += $amount;
    }

    public function decremente($amount = 1)
    {
        $this->quantity = max(1, $this->quantity - $amount);
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getProduct()
    {
        return $this->product;
    }
}

//Création des catégories
$cat1 = new Category("Vêtements homme");
$cat2 = new Category("Accessoires");
$cat3 = new Category("Chaussures");

//Création des produits
$products = [
    new Product("T-shirt", 20.0, 10, $cat1),
    new Product("Jeans", 50.0, 5, $cat1),
    new Product("Casquette", 15.0, 8, $cat2),
    new Product("Chaussures blanches", 80.0, 3, $cat3),
    new Product("Sac à dos", 40.0, 6, $cat2)
];

//Affichage des produits
echo "<h2>Catalogue de produits</h2>";
foreach ($products as $p) {
    echo "Produit : {$p->getName()}<br>";
    echo "Prix : {$p->getPrice()} €<br>";
    echo "Stock : {$p->getStock()}<br>";
    echo "Catégorie : " . $p->getCategory()->getName() . "<br><br>";
}

//Création d’un panier avec des CartItem
$cart = [
    new CartItem($products[0], 2), // 2 T-shirts
    new CartItem($products[1], 1), // 1 Jeans
    new CartItem($products[3], 3)  // 3 Chaussures blanches
];

//Affichage du panier 
echo "<h2>Panier</h2>";
$totalPanier = 0;
foreach ($cart as $item) {
    $totalItem = $item->getTotal();
    echo $item->getProduct()->getName() . " x " . $item->getQuantity() . " = " . $totalItem . " €<br>";
    $totalPanier += $totalItem;
}

echo "<br><strong>Total panier : $totalPanier €</strong>";
