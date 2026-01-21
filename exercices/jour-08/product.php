<?php

class Product
{
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;
    private Category $category;

    public function __construct(int $id, string $name, string $description, float $price, int $stock, string $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = max(0, $price); //si $price est inférieur à 0, retourne 0, sinon retourne $price.
        $this->stock = max(0, $stock);
        $this->category = $category;
    }

    public function getPriceIncludingTax(float $vat = 20): float
    {
        return $this->price * (1 + $vat / 100);
    }

    public function isInStock(): bool
    {
        return $this->stock > 0; //return true si il y a du stock
    }

    public function reduceStock(int $quantity): bool
    {
        if ($quantity <= 0 || $quantity > $this->stock) return false; //si quantité négative ou quantité supérieur au stock, opération impossible
        $this->stock -= $quantity; //sinon on soustrait la quantité au stock actuel
        return true;
    }

    public function applyDiscount(float $percentage): bool
    {
        if ($percentage <= 0 || $percentage > 100) return false; // si pourcentage négatif ou supérieur à 100, opération invalide
        $this->price *= 1 - $percentage / 100;
        return true;
    }
    //utilisation dans l'exo suivant "catalogue.php"
    public function getName(): string
    {
        return $this->name;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}

//création d'un produit
$product = new Product(1, "T-shirt", "T-shirt coton bio", 20.0, 10, "Vêtements");
//vérifie si le produit est en stock
echo $product->isInStock() ? "Produit en stock" : "Rupture de stock";
echo "<br>";
//affiche le prix TTC(TVA 20%)
echo "Prix TTC : " . $product->getPriceIncludingTax() . " €";
echo "<br>";
// Réduire le stock de 3 unités
if ($product->reduceStock(3)) {
    echo "Stock réduit de 3 unités";
} else {
    echo "Impossible de réduire le stock";
}
echo "<br>";
//vérifie le stock après réduction
echo $product->isInStock() ? "Produit encore en stock" : "Rupture de stock";
echo "<br>";
//applique une remise de 25 %
if ($product->applyDiscount(25)) {
    echo "Remise appliquée : nouveau prix TTC = " . $product->getPriceIncludingTax() . " €";
} else {
    echo "Remise invalide";
}
