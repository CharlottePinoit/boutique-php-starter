<?php


//créer un tableau associatif
$product = [
    "name" => "clavier mécanique",
    "description" => "clavier mécanique rétroéclairé pour gamers",
    "price" => 120,
    "stock" => 15,
    "category" => "informatique",
    "brand" => "KeyTech",
];
// ajouter une nouvelle clé avec date du jour
$product["dateAdded"] = date("Y-m-d");
// remise de 10%, arrondi
$priceReduct = round($product["price"] * 0.9, 2);

?>


<!-- fiche produit -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Fiche produit</title>
</head>

<body>
    <center>

        <h1><?= $product["name"]; ?></h1>

        <p>Description : <?= $product["description"]; ?></p>
        <p>Prix :<del> <?= $product["price"]; ?> €</del></p>
        <p>Prix avec réduction : <strong><?= $priceReduct; ?> €</strong></p>
        <p>Stock : <?= $product["stock"]; ?></p>
        <p>Catégorie : <?= $product["category"]; ?></p>
        <p>Marque : <?= $product["brand"]; ?></p>
        <p>Date d’ajout : <?= $product["dateAdded"]; ?></p>
    </center>

</body>

</html>