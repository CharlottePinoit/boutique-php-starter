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
    ],
    [
        "name" => "Écran 24 pouces",
        "price" => 190,
        "stock" => 8
    ]
];
?>

<!-- fiche produit -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Fiche produit</title>
</head>

<body>
    <div class="produit">
        <h2><?= $products[0]["name"] ?></h2>
        <p class="prix"><?= $products[0]["price"] ?> €</p>
        <p class="stock">Stock : <?= $products[0]["stock"] ?></p>
    </div>
    <div class="produit">
        <h2><?= $products[1]["name"] ?></h2>
        <p class="prix"><?= $products[1]["price"] ?> €</p>
        <p class="stock">Stock : <?= $products[1]["stock"] ?></p>
    </div>
    <div class="produit">
        <h2><?= $products[2]["name"] ?></h2>
        <p class="prix"><?= $products[2]["price"] ?> €</p>
        <p class="stock">Stock : <?= $products[2]["stock"] ?></p>
    </div>
    <div class="produit">
        <h2><?= $products[3]["name"] ?></h2>
        <p class="prix"><?= $products[3]["price"] ?> €</p>
        <p class="stock">Stock : <?= $products[3]["stock"] ?></p>
    </div>
    <div class="produit">
        <h2><?= $products[4]["name"] ?></h2>
        <p class="prix"><?= $products[4]["price"] ?> €</p>
        <p class="stock">Stock : <?= $products[4]["stock"] ?></p>
    </div>
    <div class="produit">
        <h2><?= $products[5]["name"] ?></h2>
        <p class="prix"><?= $products[5]["price"] ?> €</p>
        <p class="stock">Stock : <?= $products[5]["stock"] ?></p>
    </div>
</body>

</html>