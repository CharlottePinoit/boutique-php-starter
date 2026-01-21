<h1><?= e($title) ?></h1>

<?php if (empty($cart)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>


    <ul>
        <?php foreach ($cart as $productId => $quantity): ?>

            <li>
                Produit <?= $productId ?>
                <form method="post" action="/panier/modifier">
                    <input
                        type="number"
                        name="quantities[<?= $productId ?>]"
                        value="<?= $quantity ?>"
                        min="0">
                    <button type="submit">Mettre à jour</button>
                </form>
                <form method="post" action="/panier/supprimer" style="display:inline">
                    <input type="hidden" name="product_id" value="<?= $productId ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>


<?php endif; ?>

<a href="/produits">← Continuer mes achats</a>