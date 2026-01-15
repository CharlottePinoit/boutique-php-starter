<?php

require_once 'product.php'; //reprise de la classe product de l'exo précédent
//création des produits directement dans un tableau
$catalogue = [
    new Product(1, "T-shirt", "Coton bio", 20.0, 10, "Vêtements"),
    new Product(2, "Jeans", "Denim classique", 50.0, 5, "Vêtements"),
    new Product(3, "Casquette", "Casquette noire", 15.0, 8, "Accessoires"),
    new Product(4, "Chaussures", "Basket blanche", 80.0, 3, "Chaussures"),
    new Product(5, "Sac à dos", "Sac polyester", 40.0, 6, "Accessoires"),
];
//initialise les totaux
$totalStock = 0;
$totalValue = 0;

//parcourir et afficher
foreach ($catalogue as $product) {
    echo "Produit : {$product->getName()}<br>";
    echo "Prix TTC : {$product->getPriceIncludingTax()} €<br>";
    echo "Stock : {$product->getStock()}<br>";
    echo "Catégorie : {$product->getCategory()}<br><br>";

    $totalStock += $product->getStock();
    $totalValue += $product->getPriceIncludingTax() * $product->getStock();
}

//afficher les totaux
echo "<hr>";
echo "Total stock : $totalStock unités<br>";
echo "Valeur totale du catalogue : $totalValue €<br>";
