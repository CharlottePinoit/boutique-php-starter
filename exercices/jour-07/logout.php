<?php
session_start();
session_unset();   //supprime toutes les données
session_destroy(); //détruit la session côté serveur
header('Location: login.php'); //renvoie au login
exit;
