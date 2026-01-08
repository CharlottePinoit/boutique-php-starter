<?php
// Nombres de 1 à 10
echo "Nombres de 1 à 10 :";
echo "<br>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . ", ";
}
echo "<br>";

// Nombres pairs de 2 à 20
echo "Nombres pairs de 2 à 20 :";
echo "<br>";
for ($i = 2; $i <= 20; $i += 2) {
    echo $i . ", ";
}
echo "<br>";

// Compte à rebours de 10 à 0
echo "Compte à rebours de 10 à 0 :";
echo "<br>";
for ($i = 10; $i >= 0; $i--) {
    echo $i . ", ";
}
echo "<br>";

// Table de multiplication de 7
echo "Table de multiplication de 7 :";
echo "<br>";
for ($i = 1; $i <= 10; $i++) {
    echo "7 x $i = " . (7 * $i) . ", ";
}
