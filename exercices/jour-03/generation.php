<?php
$products = [];

// Génération des 10 produits
for ($i = 1; $i <= 10; $i++) {
    $products[] = [
        'name'  => "Produit $i",
        'price' => rand(10, 100),
        'stock' => rand(0, 50)
    ];
}

echo "<pre>"; // pour rendre var_dump lisible
var_dump($products);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Produits générés</title>
    <style>
        .prix {
            color: green;
        }

        .stock {
            color: blue;
        }
    </style>
</head>

<body>

    <?php foreach ($products as $product): ?>
        <article>
            <h3><?= $product['name']; ?></h3>
            <p class="prix"><?= $product['price']; ?> €</p>
            <p class="stock">Stock : <?= $product['stock']; ?></p>
        </article>
    <?php endforeach; ?>

</body>

</html>