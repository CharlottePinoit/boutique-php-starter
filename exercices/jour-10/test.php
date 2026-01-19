<?php
require_once 'Database.php';
require_once 'Category.php';
require_once 'Product.php';
require_once 'ProductRepository.php';

// Afficher les erreurs PHP pour debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// --------------------------
// Connexion PDO via Database
$pdo = Database::getInstance();

// --------------------------
// Instanciation du repository
$productRepo = new ProductRepository($pdo);

// --------------------------
// Création de catégories réelles en DB si elles n'existent pas
$categories = [
    'Vêtements',
    'Accessoires',
    'Chaussures'
];

$categoryObjects = [];

foreach ($categories as $catName) {
    // Vérifier si la catégorie existe déjà
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE nom = ?");
    $stmt->execute([$catName]);
    $data = $stmt->fetch();

    if ($data) {
        $categoryObjects[$catName] = new Category((int)$data['id'], $data['nom']);
    } else {
        // Insert si pas existante
        $stmt = $pdo->prepare("INSERT INTO categories (nom) VALUES (?)");
        $stmt->execute([$catName]);
        $categoryObjects[$catName] = new Category((int)$pdo->lastInsertId(), $catName);
    }
}

// --------------------------
// Affichage des produits initiaux
echo "<h2>Produits initiaux</h2>";
$products = $productRepo->findAll();
foreach ($products as $p) {
    $catName = $p->getCategory()?->getName() ?? 'Aucune';
    echo "{$p->getId()} - {$p->getName()} ({$catName}) - {$p->getPrice()} € - Stock: {$p->getStock()}<br>";
}

// --------------------------
// Créer un nouveau produit
$newProduct = new Product(
    id: null,
    name: "Casquette cool",
    description: "Casquette en coton",
    price: 19.99,
    stock: 50,
    category: $categoryObjects['Accessoires']
);

$productRepo->save($newProduct);

echo "<h2>Après création</h2>";
$products = $productRepo->findAll();
foreach ($products as $p) {
    $catName = $p->getCategory()?->getName() ?? 'Aucune';
    echo "{$p->getId()} - {$p->getName()} ({$catName}) - {$p->getPrice()} € - Stock: {$p->getStock()}<br>";
}

// --------------------------
// Modifier le produit
$newProduct->setPrice(24.99);
$newProduct->setStock(40);
$productRepo->update($newProduct);

echo "<h2>Après modification</h2>";
$products = $productRepo->findAll();
foreach ($products as $p) {
    $catName = $p->getCategory()?->getName() ?? 'Aucune';
    echo "{$p->getId()} - {$p->getName()} ({$catName}) - {$p->getPrice()} € - Stock: {$p->getStock()}<br>";
}

// --------------------------
// Supprimer le produit
$productRepo->delete($newProduct->getId());

echo "<h2>Après suppression</h2>";
$products = $productRepo->findAll();
foreach ($products as $p) {
    $catName = $p->getCategory()?->getName() ?? 'Aucune';
    echo "{$p->getId()} - {$p->getName()} ({$catName}) - {$p->getPrice()} € - Stock: {$p->getStock()}<br>";
}

// --------------------------
// Test find()
echo "<h2>Test find() pour ID=1</h2>";
$found = $productRepo->find(1);
if ($found) {
    $catName = $found->getCategory()?->getName() ?? 'Aucune';
    echo "Produit trouvé: {$found->getName()} ({$catName}) - {$found->getPrice()} €<br>";
} else {
    echo "Produit non trouvé.<br>";
}

// --------------------------
// Test findByCategory()
echo "<h2>Produits par catégorie: Accessoires</h2>";
$cat = $categoryObjects['Accessoires'];
$accessoryProducts = $productRepo->findByCategory($cat->getId());
foreach ($accessoryProducts as $p) {
    $catName = $p->getCategory()?->getName() ?? 'Aucune';
    echo "{$p->getId()} - {$p->getName()} ({$catName}) - {$p->getPrice()} €<br>";
}
