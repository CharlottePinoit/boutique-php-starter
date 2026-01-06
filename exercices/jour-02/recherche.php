<?php
//créer le tableau
$categories = ["Vêtements", "Chaussures", "Accessoires", "Sport"];
//chercher si chaussures existe dans le tableau
if (in_array("Chaussures", $categories)) {
    echo "trouvé!";
} else {
    echo "non trouvé :(";
}
echo "<br>";
//chercher si electronique existe dans le tableau
if (in_array("electronique", $categories)) {
    echo "trouvé!";
} else {
    echo "non trouvé :(";
}
echo "<br>";
//trouver l'index d'un élément
$indexSport = array_search("Sport", $categories);

if ($indexSport == true) {
    echo "l'index de sport est : $indexSport";
} else {
    echo " sport non trouvé :(";
}
