<?php
//Affiche l'URI demandée
echo "URI demandée : " . $_SERVER['REQUEST_URI'] . "<br>";

//Affiche la méthode HTTP (GET, POST, etc.)
echo "Méthode HTTP : " . $_SERVER['REQUEST_METHOD'] . "<br>";

echo "Hello, front controller";
