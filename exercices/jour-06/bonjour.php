<?php

// Gestion du nom
if (isset($_GET["name"]) && !empty($_GET["name"])) {
    $name = $_GET["name"];
} else {
    $name = "visiteur";
}

// Gestion de l'âge
if (isset($_GET["age"]) && !empty($_GET["age"])) {
    $age = $_GET["age"];
}

// Affichage
if (isset($age) && $name !== "visiteur") {
    echo "Bonjour $name, vous avez $age ans !";
} else {
    echo "Bonjour $name !";
}
