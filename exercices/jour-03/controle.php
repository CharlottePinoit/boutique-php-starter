<?php
$products = [
    ['name' => 'Produit 1', 'price' => 45,  'stock' => 10],
    ['name' => 'Produit 2', 'price' => 120, 'stock' => 5],
    ['name' => 'Produit 3', 'price' => 30,  'stock' => 0],
    ['name' => 'Produit 4', 'price' => 80,  'stock' => 20],
    ['name' => 'Produit 5', 'price' => 95,  'stock' => 0],
    ['name' => 'Produit 6', 'price' => 60,  'stock' => 15],
    ['name' => 'Produit 7', 'price' => 200, 'stock' => 10],
    ['name' => 'Produit 8', 'price' => 50,  'stock' => 25],
    ['name' => 'Produit 9', 'price' => 70,  'stock' => 0],
    ['name' => 'Produit 10', 'price' => 40,  'stock' => 5],
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Produits en stock</title>
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
        <?php
        if ($product['stock'] == 0) {
            continue; // saute les produits sans stock
        }
        if ($product['price'] > 100) {
            break; // stoppe si le prix > 100
        }
        ?>
        <article>
            <h3><?= $product['name']; ?></h3>
            <p class="prix"><?= $product['price']; ?> €</p>
            <p class="stock">Stock : <?= $product['stock']; ?></p>
        </article>
    <?php endforeach; ?>

</body>

</html>