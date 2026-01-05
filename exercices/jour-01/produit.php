<?php
$name = "Casque Audio";
$price = 29.99;
$stock = 50;
$onSale = true;
var_dump($name);
var_dump($price);
var_dump($stock);
var_dump($onSale);
echo "<br>Le produit $name coûte $price €";
// ici je met une balise html <br> pour le retour à la ligne car le navigateur ne lit que du html et pas les commandes php

//❓ Questions à te poser : Quelle différence vois-tu entre var_dump($price) quand $price = "29.99" vs $price = 29.99 ?
// le premier est de type string et le second de type float, le type float est à privilégier pour les nombres car il peut y avoir des erreurs quand on fait des calculs avec des strings