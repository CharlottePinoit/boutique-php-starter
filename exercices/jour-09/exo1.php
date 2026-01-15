<?php

//Classe Category
class Category
{
    private string $name;

    public function __construct(string $name)
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
    private string $name;
    private float $price;
    private int $stock;
    private $category;

    public function __construct(string $name, float $price, int $stock, $category)
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

//Création des catégories
$cat1 = new Category("Vêtements homme");
$cat2 = new Category("Accessoires");
$cat3 = new Category("Chaussures");

//Création des produits dans un tableau
$products = [
    new Product("T-shirt", 20.0, 10, $cat1),
    new Product("Jeans", 50.0, 5, $cat1),
    new Product("Casquette", 15.0, 8, $cat2),
    new Product("Chaussures blanches", 80.0, 3, $cat3),
    new Product("Sac à dos", 40.0, 6, $cat2)
];

//Affichage des produits avec leur catégorie
foreach ($products as $p) {
    echo "Produit : {$p->getName()}<br>";
    echo "Prix : {$p->getPrice()} €<br>";
    echo "Stock : {$p->getStock()}<br>";
    echo "Catégorie : " . $p->getCategory()->getName() . "<br><br>";
}
