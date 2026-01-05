<?php
$a = "5";
$b = 3;
$c = $a + $b;

var_dump($a);
var_dump($b);
var_dump($c);
echo "<br>";

$price = "29.99€";
$result = $price + 10;
var_dump($result);
//Que se passe-t-il quand PHP additionne un string et un int ?
// php essaye de convertir la chaîne de caractère en nombre mais il peut faire des erreurs
// Pourquoi le deuxième exemple pose problème ?
// le fait que dans la chaîne de caractère, il y ai un symbole fait que php ne convertit pas correctement la dîtes chaîne en nombre
