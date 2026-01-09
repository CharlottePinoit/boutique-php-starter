<?php

//Données produit
$priceHT = 100;
$vatRate = 20;
$discountRate = 10;

//Calcul TVA
function calculateVAT($priceExcludingTax, $rate)
{
    return $priceExcludingTax * ($rate / 100);
}

//Calcul prix TTC
function calculateIncludingTax($priceExcludingTax, $rate)
{
    return $priceExcludingTax + calculateVAT($priceExcludingTax, $rate);
}

//Calcul prix après remise
function calculateDiscount($price, $percentage)
{
    return $price - ($price * ($percentage / 100));
}

//Calculs
$vatAmount = calculateVAT($priceHT, $vatRate);
$priceTTC = calculateIncludingTax($priceHT, $vatRate);
$priceAfterDiscount = calculateDiscount($priceTTC, $discountRate);

//Affichage
echo "Prix HT : {$priceHT} €";
echo "<br>";
echo "TVA ({$vatRate}%) : {$vatAmount} €";
echo "<br>";
echo "Prix TTC : {$priceTTC} €";
echo "<br>";
echo "Remise ({$discountRate}%) : " . ($priceTTC - $priceAfterDiscount) . " €";
echo "<br>";
echo "Prix final : {$priceAfterDiscount} €";
