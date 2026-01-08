<?php
$products = [
    [
        'name'  => 'Ordinateur portable',
        'price' => 899.99,
        'stock' => 10
    ],
    [
        'name'  => 'Clavier',
        'price' => 49.90,
        'stock' => 25
    ],
    [
        'name'  => 'Souris',
        'price' => 25.50,
        'stock' => 50
    ],
    [
        'name'  => 'Écran',
        'price' => 199.00,
        'stock' => 15
    ],
    [
        'name'  => 'Casque audio',
        'price' => 79.99,
        'stock' => 30
    ]
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste de produits</title>
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