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

//préparer et exécuter la requête SELECT
$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql); // exécute directement une requête simple sans paramètres

//récupérer tous les résultats sous forme de tableau associatif
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

//afficher les produits dans un tableau HTML
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Prix</th><th>Stock</th></tr>";

foreach ($products as $product) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($product['name']) . "</td>";
    echo "<td>" . number_format($product['price'], 2, ',', ' ') . " €</td>";
    echo "<td>" . $product['stock'] . "</td>";
    echo "</tr>";
}

echo "</table>";
