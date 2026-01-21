<?php
$title = 'Catalogue';


?>

<h1>Catalogue</h1>

<?php foreach ($products as $product): ?>
    <article>
        <h2><?= e($product->getName()) ?></h2>
        <p><?= $product->getPrice() ?> €</p>
        <a href="/produit/<?= $product->getId() ?>">Voir le détail</a>
        <form method="post" action="/panier/ajouter">
            <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Ajouter au panier</button>
        </form>
    </article>
<?php endforeach; ?>