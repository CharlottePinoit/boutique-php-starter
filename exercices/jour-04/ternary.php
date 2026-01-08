<?php
$product = [
    'name'   => 'Casque audio',
    'price'  => 120,
    'stock'  => 5,
    'onSale' => true
];

// Prix avec réduction 20 % si promo
$discountedPrice = $product['price'] * 0.8;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Produit</title>
    <style>
        .product {
            border: 1px solid #ccc;
            padding: 15px;
            width: 300px;
        }

        .disponible {
            border-color: green;
        }

        .rupture {
            border-color: red;
        }

        .old-price {
            text-decoration: line-through;
            color: grey;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div class="product <?= $product['stock'] > 0 ? 'disponible' : 'rupture' ?>">

        <h3>
            <?= $product['name'] ?>
            <?= $product['onSale'] ? 'PROMO' : '' ?>
        </h3>

        <p>
            <?php if ($product['onSale']): ?>
                <span class="old-price"><?= $product['price'] ?> €</span>
                <strong><?= $discountedPrice ?> €</strong>
            <?php else: ?>
                <strong><?= $product['price'] ?> €</strong>
            <?php endif; ?>
        </p>

        <p>
            <?= $product['stock'] > 0 ? 'In stock' : 'Out of stock' ?>
        </p>

    </div>

</body>

</html>