<!DOCTYPE html>
<html>

<head>
    <title>Nos produits</title>
</head>

<body>
    <h1>Catalogue</h1>

    <?php foreach ($products as $product): ?>
        <article>
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p>Prix : <?= $product['price'] ?> €</p>
            <a href="/produit/<?= $product['id'] ?>">Voir le détail</a>
            <form method="post" action="/panier/ajouter">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit">Ajouter au panier</button>
            </form>


        </article>
    <?php endforeach; ?>
</body>

</html>