<?php
$groceries = ["Pommes", "Bananes", "Lait", "Pain", "Fromage"];
//affiche le 1er article
echo $groceries[0];
echo "<br>";
//affiche le dernier article avec count()
// on commence par récuperer l'index de notre dernier article
$lastIndex = count($groceries) - 1;
echo $groceries[$lastIndex];
echo "<br>";
//affiche le nombre total d'articles
echo count($groceries);
echo "<br>";
//ajoute 2 articles à la fin
// 2 manières de le faire
$groceries[] = "Yaourt";
array_push($groceries, "Riz");
//supprime le 3ème article, en index 2
unset($groceries[2]);
//affiche le tableau final
var_dump($groceries);
