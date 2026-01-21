<h1><?= e($product->getName()) ?></h1>
<p><?= e($product->getDescription()) ?></p>
<p><strong><?= $product->getPrice() ?> €</strong></p>

<a href="/produits">← Retour au catalogue</a>