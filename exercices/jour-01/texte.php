<?php
$brand = "Nike";
$model = "Air Max";
// Avec concaténation
echo "Chaussures " . $brand . " " . $model . "<br>";
// Avec interpolation
echo "Chaussures $brand $model<br>";
// Avec sprintf
echo sprintf("Chaussures %s %s<br>", $brand, $model);


$price = 99.99;
echo "Prix : $price €<br>";  // Que s'affiche-t-il ?
echo 'Prix : $price €';  // Et là ?
