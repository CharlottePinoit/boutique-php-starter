<?php
//connexion à la base de données
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("❌ Erreur de connexion : " . $e->getMessage());
}

//récupérer le mot recherché depuis le formulaire
$search = $_GET['search'] ?? ''; // Si aucun mot saisi, $search = ''

//préparer la requête SQL avec un paramètre
$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");

//exécuter la requête en passant le paramètre
$stmt->execute(['%' . $search . '%']);

//récupérer tous les résultats
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--formulaire HTML-->
<form method="get">
    <input type="text" name="search" placeholder="Rechercher un produit" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Rechercher</button>
</form>
<?php if ($products) : ?>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li>
                <?= htmlspecialchars($product['name']) ?> —
                <?= number_format($product['price'], 2, ',', ' ') ?> €
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Aucun produit trouvé.</p>
<?php endif; ?>