<?php
//tableau produits
$products = [
    ["name" => "Ordinateur portable", "price" => 800],
    ["name" => "Clavier mécanique", "price" => 100],
    ["name" => "Souris sans fil", "price" => 50],
    ["name" => "Écran 24 pouces", "price" => 200],
    ["name" => "Casque audio", "price" => 70],
    ["name" => "Webcam HD", "price" => 40],
    ["name" => "Disque dur externe", "price" => 120],
    ["name" => "Routeur WiFi", "price" => 60],
    ["name" => "Tablette tactile", "price" => 300],
    ["name" => "Imprimante laser", "price" => 150],
];

//récupérer le terme de recherche
$search = $_GET['search'] ?? '';

//tableau stocke les résultats
$results = [];
//boucle sur chaque produit
foreach ($products as $product) {
    if (stripos($product['name'], $search) !== false) { //stripos insensible à la casse
        $results[] = $product;
    }
}
?>

<form method="get">
    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
</form>

<?php
if (!empty($results)) { //si tableau résultat non vide
    echo "<ul>";
    foreach ($results as $product) { //boucle sur chaque résultat obtenu
        echo "<li>" . htmlspecialchars($product['name']) . " - " . $product['price'] . "€</li>";
        //ici le tableau est écrit par moi donc pas besoin du htlmspecialchars mais il provient d'une BDD, par précaution il vaut mieux le mettre
    }
    echo "</ul>";
} else {
    echo "<p>Aucun résultat</p>";
}
?>