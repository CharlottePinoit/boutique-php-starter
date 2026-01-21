<?php
// Informations du produit
$name = "Casque Audio";
$description = "Casque sans fil avec réduction de bruit active";
$priceHT = 99.90;
$vatRate = 20;      // TVA en %
$stock = 5;

// Bonus
$discount = 10;     // remise en %

// Calcul TVA
$vatAmount = $priceHT * ($vatRate / 100);

// Prix TTC
$priceTTC = $priceHT + $vatAmount;

// Prix remisé
$discountAmount = $priceTTC * ($discount / 100);
$priceAfterDiscount = $priceTTC - $discountAmount;

$priceHTFormatted = number_format($priceHT, 2, ',', ' ');
$priceTTCFormatted = number_format($priceTTC, 2, ',', ' ');
$priceAfterDiscountFormatted = number_format($priceAfterDiscount, 2, ',', ' ');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $name ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .card {
            background: white;
            padding: 20px;
            width: 400px;
            margin: 40px auto;
            border-radius: 6px;
        }

        .price {
            font-size: 1.2em;
            font-weight: bold;
        }

        .stock {
            color: green;
        }

        .out {
            color: red;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1><?= $name ?></h1>

        <p><?= $description ?></p>

        <p>Prix HT : <?= $priceHTFormatted ?> €</p>
        <p>TVA : <?= $vatRate ?> %</p>

        <p class="price">Prix TTC : <?= $priceTTCFormatted ?> €</p>

        <p>Prix après remise (<?= $discount ?> %) :
            <?= $priceAfterDiscountFormatted ?> €
        </p>
        <?php if ($stock > 0): ?>
            <span class="stock">En stock (<?= $stock ?> disponibles)</span>
        <?php else: ?>
            <span class="out">Rupture de stock</span>
        <?php endif; ?>
    </div>
</body>

</html>