<?php
$products = [
    [
        "name" => "Clavier mécanique",
        "price" => 120,
        "stock" => 15
    ],
    [
        "name" => "Souris sans fil",
        "price" => 45,
        "stock" => 30
    ],
    [
        "name" => "Casque audio",
        "price" => 80,
        "stock" => 20
    ],
    [
        "name" => "Webcam HD",
        "price" => 60,
        "stock" => 10
    ],
    [
        "name" => "Tapis de souris",
        "price" => 15,
        "stock" => 50
    ]
];

//affiche le nom du 3eme produit
echo $products[2]["name"];
echo "<br>";
//affiche le prix du 1er produit
echo $products[0]["price"];
echo "<br>";
//affiche le stock du dernier produit
echo $products[4]["stock"];
echo "<br>";
//ajoute 10unités au stock du 2nd produit
$products[1]["stock"] += 10;
var_dump($products[1]);
echo "<br>";
