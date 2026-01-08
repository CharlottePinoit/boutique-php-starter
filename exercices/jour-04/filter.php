<?php
$products = [
    ['name' => 'Clavier',        'price' => 45,  'stock' => 10, 'category' => 'accessories'],
    ['name' => 'Souris',         'price' => 25,  'stock' => 0,  'category' => 'accessories'],
    ['name' => 'Écran',          'price' => 180, 'stock' => 5,  'category' => 'hardware'],
    ['name' => 'Casque',         'price' => 49,  'stock' => 8,  'category' => 'audio'],
    ['name' => 'Webcam',         'price' => 35,  'stock' => 12, 'category' => 'video'],
    ['name' => 'Tapis souris',   'price' => 15,  'stock' => 20, 'category' => 'accessories'],
    ['name' => 'Micro',          'price' => 70,  'stock' => 3,  'category' => 'audio'],
    ['name' => 'Chargeur USB',   'price' => 20,  'stock' => 0,  'category' => 'accessories'],
    ['name' => 'Clé USB',        'price' => 12,  'stock' => 25, 'category' => 'storage'],
    ['name' => 'Support laptop', 'price' => 40,  'stock' => 6,  'category' => 'hardware'],
];

$totalProducts = count($products);
$foundProducts = 0;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Catalogue filtré</title>
    <style>
        article {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            width: 300px;
        }
    </style>
</head>

<body>

    <h2>Produits disponibles à moins de 50 €</h2>

    <?php foreach ($products as $product): ?>

        <?php
        // Conditions de filtrage
        if ($product['stock'] <= 0) {
            continue;
        }

        if ($product['price'] >= 50) {
            continue;
        }

        // Si on arrive ici, le produit est valide
        $foundProducts++;
        ?>

        <article>
            <h3><?= $product['name'] ?></h3>
            <p>Price: <?= $product['price'] ?> €</p>
            <p>Stock: <?= $product['stock'] ?></p>
            <p>Category: <?= $product['category'] ?></p>
        </article>

    <?php endforeach; ?>

    <p>
        <?= $foundProducts ?> produits trouvés sur <?= $totalProducts ?>
    </p>

</body>

</html>