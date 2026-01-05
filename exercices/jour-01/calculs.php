<?php
$priceExcludingTax = 100;
$vat = 20;
$quantity = 3;

//on calcule d'abord le montant de cette TVA = prix HT * taux / 100 en déclarant une nouvelle variable
$vatAmount = $priceExcludingTax * $vat / 100;
echo "Montant de la TVA : {$vatAmount} €<br>";
// on calcule ensuite le montant avec taxe incluse TTC = prix HT + TVA en déclarant une nouvelle variable
$priceIncludingTax = $priceExcludingTax + $vatAmount;
echo "Prix TTC unitaire : {$priceIncludingTax} €<br>";
//on calcule enfin le montant total pour une quantité déclaré au préalable prixTotal = prix TTC * quantité  en déclarant une nouvelle variable
$total = $priceIncludingTax * $quantity;
echo "Total pour {$quantity} produits : {$total} €<br>";
// dans cet exercice, je mets toutes les variables entre accolade pour éviter les erreurs d'interprétation de variables car je met le symbole € juste derrière
