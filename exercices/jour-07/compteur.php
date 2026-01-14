<?php
//démarrer session
session_start();
//créer ou incrémenter la variable de session
if (isset($_SESSION['visits'])) {
    $_SESSION['visits']++; //augmente de 1
} else {
    $_SESSION['visits'] = 1; //première visite
}
//afficher le nombre de visites
echo "Vous avez visité cette page " . $_SESSION['visits'] . " fois.";

//vérifier si le compteur doit être réinitialisé
if (isset($_GET['reset'])) {
    $_SESSION['visits'] = 0; //problème:l'url reste sur reset=1 donc ne compte plus après le premier reset
    //contournement: rediriger vers la même page sans ?reset
    header("Location: compteur.php");
    exit; // arrêter l’exécution pour éviter que le reste du code s’exécute
}
//lien pour réinitialiser
echo "<br>";
echo '<a href="?reset=1">Réinitialiser le compteur</a>';
