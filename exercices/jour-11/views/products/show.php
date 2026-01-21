<!DOCTYPE html>
<html>

<head>
    <title><?= htmlspecialchars($product['name']) ?></title>
</head>

<body>
    <h1><?= htmlspecialchars($product['name']) ?></h1>
    <p>Prix : <?= $product['price'] ?> €</p>

    <a href="/produits">← Retour au catalogue</a>
</body>

</html>