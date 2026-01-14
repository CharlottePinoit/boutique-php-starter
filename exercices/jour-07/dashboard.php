<?php
session_start();

//vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

//affiche le message
echo "Bonjour " . htmlspecialchars($_SESSION['user']) . " !";

// Lien pour se déconnecter
echo '<br><a href="logout.php">Se déconnecter</a>';
