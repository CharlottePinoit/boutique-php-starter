<!DOCTYPE html>
<html>

<head>
    <title>Mon panier</title>
</head>

<body>

    <h1>Panier</h1>

    <?php if (empty($cart)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>

        <form method="post" action="/panier/modifier">
            <ul>
                <?php foreach ($cart as $productId => $quantity): ?>
                    <li>
                        Produit <?= $productId ?>

                        <input
                            type="number"
                            name="quantities[<?= $productId ?>]"
                            value="<?= $quantity ?>"
                            min="0">

                        <form method="post" action="/panier/supprimer" style="display:inline">
                            <input type="hidden" name="product_id" value="<?= $productId ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>

            <button type="submit">Mettre à jour</button>
        </form>

    <?php endif; ?>

    <a href="/produits">← Continuer mes achats</a>

</body>

</html>