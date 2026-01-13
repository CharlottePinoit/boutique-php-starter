<?php
$products = [
    ["name" => "Ordinateur portable", "price" => 800, "category" => "Informatique", "inStock" => true],
    ["name" => "Clavier mécanique", "price" => 100, "category" => "Informatique", "inStock" => true],
    ["name" => "Souris sans fil", "price" => 50, "category" => "Informatique", "inStock" => false],
    ["name" => "Écran 24 pouces", "price" => 200, "category" => "Informatique", "inStock" => true],
    ["name" => "Casque audio", "price" => 70, "category" => "Audio", "inStock" => true],
    ["name" => "Webcam HD", "price" => 40, "category" => "Informatique", "inStock" => false],
    ["name" => "Disque dur externe", "price" => 120, "category" => "Informatique", "inStock" => true],
    ["name" => "Routeur WiFi", "price" => 60, "category" => "Réseau", "inStock" => true],
    ["name" => "Tablette tactile", "price" => 300, "category" => "Informatique", "inStock" => false],
    ["name" => "Imprimante laser", "price" => 150, "category" => "Informatique", "inStock" => true],
    ["name" => "Enceinte Bluetooth", "price" => 80, "category" => "Audio", "inStock" => true],
    ["name" => "Smartphone", "price" => 600, "category" => "Téléphonie", "inStock" => true],
    ["name" => "Chargeur USB-C", "price" => 25, "category" => "Accessoires", "inStock" => true],
    ["name" => "Casque gaming", "price" => 120, "category" => "Audio", "inStock" => false],
    ["name" => "Microphone USB", "price" => 90, "category" => "Audio", "inStock" => true],
];
//récupération des données
$search = $_GET['search'] ?? '';
$categoryFilter = $_GET['category'] ?? '';
$maxPrice = $_GET['maxPrice'] ?? '';
$inStockOnly = isset($_GET['inStock']);

//tableau qui récupère les résultats trouvés
$results = [];

//fonction filtre qui met dans le tableau uniquement les produits ayant passés tous les filtres
function filterProducts($products, $search, $categoryFilter, $maxPrice, $inStockOnly)
{
    $results = [];
    foreach ($products as $product) {
        if ($search !== '' && stripos($product['name'], $search) === false) continue;
        if ($categoryFilter !== '' && $product['category'] !== $categoryFilter) continue;
        if ($maxPrice !== '' && $product['price'] > $maxPrice) continue;
        if ($inStockOnly && !$product['inStock']) continue;
        $results[] = $product;
    }
    return $results;
}
$results = filterProducts($products, $search, $categoryFilter, $maxPrice, $inStockOnly);
?>

<form method="get">

    <label for="search">Recherche par nom</label>
    <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Recherche par nom">

    <label for="category">Catégorie</label>
    <select id="category" name="category">
        <option value="">Toutes les catégories</option>
        <?php
        $categories = ["Informatique", "Audio", "Réseau", "Téléphonie", "Accessoires"]; //tableau pour éviter d'écrire "option" pour chaque cas
        foreach ($categories as $cat):
            $selected = ($categoryFilter === $cat) ? 'selected' : '';
        ?>
            <option value="<?= $cat ?>" <?= $selected ?>><?= $cat ?></option>
        <?php endforeach; ?>
    </select>

    <label for="maxPrice">Prix maximum</label>
    <input type="number" id="maxPrice" name="maxPrice" value="<?= htmlspecialchars($maxPrice) ?>" placeholder="Prix max">

    <label>
        <input type="checkbox" name="inStock" <?= $inStockOnly ? 'checked' : '' ?>> En stock uniquement
    </label>

    <button type="submit">Filtrer</button>
</form>

<?php if (!empty($results)): ?>
    <ul>
        <?php foreach ($results as $product): ?>
            <li>
                <?= htmlspecialchars($product['name']) ?> -
                <?= $product['price'] ?>€ -
                <?= htmlspecialchars($product['category']) ?> -
                <?= $product['inStock'] ? "En stock" : "Rupture" ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun résultat</p>
<?php endif; ?>