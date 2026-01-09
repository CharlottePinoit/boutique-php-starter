<?php

//Badge
function displayBadge($text, $color)
{
    return "<span class=\"badge\" style=\"background: $color; color: white; padding: 2px 6px; border-radius: 4px;\">$text</span>";
}

//Prix avec réduction optionnelle
function displayPrice($price, $discount = 0)
{
    if ($discount > 0) {
        $discountedPrice = $price * (1 - $discount / 100);
        return "<span style=\"text-decoration: line-through; color: gray;\">$price €</span> <span style=\"color: red; font-weight: bold;\">$discountedPrice €</span>";
    }
    return "<span>$price €</span>";
}

//Stock avec couleur selon quantité
function displayStock($quantity)
{
    if ($quantity <= 0) {
        $color = "red";
        $text = "Rupture de stock";
    } elseif ($quantity < 5) {
        $color = "orange";
        $text = "Peu en stock ($quantity)";
    } else {
        $color = "green";
        $text = "En stock ($quantity)";
    }
    return "<span style=\"color: $color; font-weight: bold;\">$text</span>";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Exemple Fonctions d'affichage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .badge {
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    <h1>Exemple d'affichage avec fonctions PHP</h1>

    <h2>Badges</h2>
    <?= displayBadge("Nouveau", "blue") . " "; ?>
    <?= displayBadge("Promotion", "green") . " "; ?>
    <?= displayBadge("Urgent", "red"); ?>

    <h2>Prix</h2>
    <p>Produit A : <?= displayPrice(50); ?></p>
    <p>Produit B : <?= displayPrice(100, 20); ?></p>

    <h2>Stock</h2>
    <p>Produit A : <?= displayStock(0); ?></p>
    <p>Produit B : <?= displayStock(3); ?></p>
    <p>Produit C : <?= displayStock(10); ?></p>

</body>

</html>