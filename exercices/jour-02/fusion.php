<?php
$clothes = ["T-shirt", "Jean", "Pull"];
$accessories = ["Ceinture", "Montre", "Lunettes"];
// fusion des 2 tableaux
$catalog = array_merge($clothes, $accessories);
echo "nbr total de produit: " . count($catalog);
echo "<br>";
//ajouter un élément en début de tableau
array_unshift($catalog, "Jupe");
var_dump($catalog);
