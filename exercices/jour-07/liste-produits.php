<?php
//connexion PDO
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

//Récupérer les produits
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--tableau HTML-->
<table border="1" cellpadding="5">
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
    </tr>
    <?php foreach ($products as $product) : ?>
        <tr>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= number_format($product['price'], 2, ',', ' ') ?> €</td>
            <td><?= $product['stock'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>