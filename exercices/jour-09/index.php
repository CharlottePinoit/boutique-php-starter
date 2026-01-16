<?php

require_once 'Category.php';
require_once 'Product.php';
require_once 'CartItem.php';
require_once 'Cart.php';
require_once 'Address.php';
require_once 'User.php';
require_once 'Order.php';

// --------------------------------------
//Création des catégories
$cat1 = new Category("Vêtements homme");
$cat2 = new Category("Accessoires");
$cat3 = new Category("Chaussures");

// --------------------------------------
//Création des produits
$products = [
    new Product("T-shirt", 20.0, 10, $cat1),
    new Product("Jeans", 50.0, 5, $cat1),
    new Product("Casquette", 15.0, 8, $cat2),
    new Product("Chaussures blanches", 80.0, 3, $cat3),
    new Product("Sac à dos", 40.0, 6, $cat2)
];

// --------------------------------------
//Affichage du catalogue
echo "<h2>Catalogue de produits</h2>";
foreach ($products as $p) {
    echo "Produit : {$p->getName()}<br>";
    echo "Prix : {$p->getPrice()} €<br>";
    echo "Stock : {$p->getStock()}<br>";
    echo "Catégorie : " . $p->getCategory()->getName() . "<br><br>";
}

// --------------------------------------
//Création d’un panier
$cart = new Cart();

// Test add()
$cart->add($products[0], 2); // 2 T-shirts
$cart->add($products[1], 1); // 1 Jeans
$cart->add($products[0], 1); // +1 T-shirt

echo "<h2>Panier après ajouts</h2>";
foreach ($cart->getItems() as $item) {
    echo $item->getProduct()->getName() . " x " . $item->getQuantity() . "<br>";
}

// Test update()
$cart->update($products[1], 3); // Passe le Jeans à 3 unités

// Test remove()
$cart->remove($products[0]); // Supprime les T-shirts

echo "<h2>Panier après update et remove</h2>";
foreach ($cart->getItems() as $item) {
    echo $item->getProduct()->getName() . " x " . $item->getQuantity() . "<br>";
}

// Test getTotal() et count()
echo "<br>Total articles dans le panier : " . $cart->count();
echo "<br>Total panier : " . $cart->getTotal() . " €";

// Test clear()
$cart->clear();

echo "<h2>Panier après clear()</h2>";
echo "Nombre d’articles : " . $cart->count();
echo "<br>Total panier : " . $cart->getTotal() . " €";

// --------------------------------------
//User et Address

// Création des utilisateurs
$user1 = new User("Charlotte Pinoit", "charlotte@example.com");
$user2 = new User("Jean Dupont", "jean@example.com");

// Création des adresses
$address1 = new Address("10 rue de Paris", "Paris", "75001", "France");
$address2 = new Address("25 avenue des Champs", "Paris", "75008", "France");
$address3 = new Address("5 rue du Rhône", "Lyon", "69001", "France");

// Attribution des adresses aux utilisateurs
$user1->addAddress($address1, true); // par défaut
$user1->addAddress($address2);

$user2->addAddress($address3, true);

// Affichage des utilisateurs et adresses
echo "<h2>Utilisateurs et leurs adresses</h2>";

$users = [$user1, $user2];

foreach ($users as $user) {
    echo "<strong>" . $user->getName() . "</strong> (" . $user->getEmail() . ")<br>";
    echo "Date d'inscription : " . $user->getDateInscription()->format('d/m/Y') . "<br>";
    echo "Adresses :<br>";
    foreach ($user->getAddresses() as $addr) {
        echo "- " . $addr . "<br>";
    }
    echo "Adresse par défaut : " . $user->getDefaultAddress() . "<br><br>";
}
// --------------------------
// EXERCICE 5 : Order

// Création d’un panier pour l’exemple
$cartOrder = new Cart();
$cartOrder->add($products[0], 2); // 2 T-shirts
$cartOrder->add($products[1], 1); // 1 Jeans
$cartOrder->add($products[3], 1); // 1 Chaussure

// Création d’une commande pour user1
$order1 = new Order(1, $user1, $cartOrder);

// Affichage de la commande
echo "<h2>Commande n°{$order1->getId()} pour {$order1->getUser()->getName()}</h2>";
echo "Date : " . $order1->getDate()->format('d/m/Y H:i') . "<br>";
echo "Statut : " . $order1->getStatus() . "<br><br>";

echo "<strong>Items :</strong><br>";
foreach ($order1->getItems() as $item) {
    echo $item->getProduct()->getName() . " x " . $item->getQuantity() . " = " . $item->getTotal() . " €<br>";
}

echo "<br>Total articles : " . $order1->getItemCount();
echo "<br>Total commande : " . $order1->getTotal() . " €<br>";

// Changer le statut
$order1->setStatus("Expédiée");
echo "<br>Statut après mise à jour : " . $order1->getStatus();

// Création du panier
$cart = new Cart();

$cart->add($products[0], 2)   // 2 T-shirts
    ->add($products[1], 1)   // 1 Jeans
    ->add($products[3], 3)   // 3 Chaussures blanches
    ->remove($products[0]);  // supprime les T-shirts

// Affichage du panier
echo "<h2>Panier avec fluent interface</h2>";
foreach ($cart->getItems() as $item) {
    echo $item->getProduct()->getName() . " x " . $item->getQuantity() . " = " . $item->getTotal() . " €<br>";
}

echo "<br>Total panier : " . $cart->getTotal() . " €";
