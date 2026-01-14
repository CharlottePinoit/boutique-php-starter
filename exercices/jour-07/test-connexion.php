<?php
//essayer de se connecter à la base avec PDO
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4", //informations de connexion
        "dev", //utilisateur MySQL
        "dev", //mot de passe MySQL
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] //options : gérer les erreurs avec exceptions
    );

    //si tout va bien
    echo "✅ Connexion réussie !";
} catch (PDOException $e) {
    //si une erreur survient
    echo "❌ Erreur : " . $e->getMessage();
}
