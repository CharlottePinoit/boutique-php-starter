<?php

//CONNEXION À LA BASE DE DONNÉES

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

//CREATE — AJOUTER UN PRODUIT
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "add") {
    $stmt = $pdo->prepare(
        "INSERT INTO products (name, price, stock) VALUES (?, ?, ?)"
    );
    $stmt->execute([
        $_POST["name"],
        $_POST["price"],
        $_POST["stock"]
    ]);

    header("Location: admin-produits.php");
    exit;
}


//UPDATE — MODIFIER UN PRODUIT

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "edit") {
    $stmt = $pdo->prepare(
        "UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?"
    );
    $stmt->execute([
        $_POST["name"],
        $_POST["price"],
        $_POST["stock"],
        $_POST["id"]
    ]);

    header("Location: admin-produits.php");
    exit;
}

//DELETE — SUPPRIMER UN PRODUIT
if (isset($_GET["delete"])) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET["delete"]]);

    header("Location: admin-produits.php");
    exit;
}


//RÉCUPÉRER UN PRODUIT À MODIFIER 

$productToEdit = null;

if (isset($_GET["edit"])) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET["edit"]]);
    $productToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

//READ — RÉCUPÉRER TOUS LES PRODUITS
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin Produits</title>
</head>

<body>

    <h1>Administration des produits</h1>

    <!-- FORMULAIRE AJOUT / MODIFICATION -->
    <h2><?= $productToEdit ? "Modifier un produit" : "Ajouter un produit" ?></h2>

    <form method="post">
        <input type="hidden" name="action" value="<?= $productToEdit ? "edit" : "add" ?>">

        <?php if ($productToEdit): ?>
            <input type="hidden" name="id" value="<?= $productToEdit["id"] ?>">
        <?php endif; ?>

        <input
            type="text"
            name="name"
            placeholder="Nom du produit"
            required
            value="<?= $productToEdit["name"] ?? "" ?>">

        <input
            type="number"
            step="0.01"
            name="price"
            placeholder="Prix"
            required
            value="<?= $productToEdit["price"] ?? "" ?>">

        <input
            type="number"
            name="stock"
            placeholder="Stock"
            required
            value="<?= $productToEdit["stock"] ?? "" ?>">

        <button type="submit">
            <?= $productToEdit ? "Mettre à jour" : "Ajouter" ?>
        </button>

        <?php if ($productToEdit): ?>
            <a href="admin-produits.php">Annuler</a>
        <?php endif; ?>
    </form>

    <hr>
    <!-- LISTE DES PRODUITS -->
    <h2>Liste des produits</h2>

    <table border="1" cellpadding="5">
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product["name"]) ?></td>
                <td><?= number_format($product["price"], 2, ',', ' ') ?> €</td>
                <td><?= $product["stock"] ?></td>
                <td>
                    <a href="?edit=<?= $product["id"] ?>">Modifier</a> |
                    <a href="?delete=<?= $product["id"] ?>"
                        onclick="return confirm('Supprimer ce produit ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>