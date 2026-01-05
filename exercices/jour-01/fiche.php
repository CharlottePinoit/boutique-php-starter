<?php
// Données du produit
$name = "Casque Audio";
$price = 29.99;
$stock = 12;

//<? est un raccourcit php, précise qu'on récupère la donnée déclarée dans php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $name ?></title>
</head>

<body>
    <h1><?= $name ?></h1>

    <p>Prix : <?= $price ?> €</p>

    <?php if ($stock > 0): ?>
        <span>En stock</span>
    <?php else: ?>
        <span>Rupture</span>
    <?php endif; ?>

</body>

</html>