<?php
$a = 0;
$b = "";
$c = null;
$d = false;
$e = "0";
// Comparaison avec ==
echo "Comparaisons avec == :";
echo "<br>";
var_dump($a == $b); // 0 == ""  false
echo "<br>";
var_dump($a == $c); // 0 == null  true
echo "<br>";
var_dump($a == $d); // 0 == false  true
echo "<br>";
var_dump($a == $e); // 0 == "0"  true
echo "<br>";

echo "<br>Comparaisons avec === :";
echo "<br>";
var_dump($a === $b); // 0 === ""  false
echo "<br>";
var_dump($a === $c); // 0 === null  false
echo "<br>";
var_dump($a === $d); // 0 === false  false
echo "<br>";
var_dump($a === $e); // 0 === "0"  false