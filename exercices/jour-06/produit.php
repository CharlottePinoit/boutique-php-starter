<?php

$products = [
    1 => ["name" => "T-shirt", "price" => 29.99],
    2 => ["name" => "Jean", "price" => 79.99],
    3 => ["name" => "Pull", "price" => 49.99],
    4 => ["name" => "Veste", "price" => 119.99],
    5 => ["name" => "Chaussures", "price" => 89.99],
];

$id = $_GET['id'] ?? null;

if ($id !== null && isset($products[$id])) {
    $product = $products[$id];

    echo "Produit : " . $product['name'] . "<br>";
    echo "Prix : " . $product['price'] . " €";
} else {
    echo "Produit non trouvé";
}
