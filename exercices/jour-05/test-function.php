<?php
require_once 'ecommerce-helpers.php';

echo calculateIncludingTax(100, 20);
echo "<br>";
echo calculateDiscount(100, 15);
echo "<br>";
echo calculateTotal([10, 20, 20]);
echo "<br>";
$total = calculateTotal([9.5, 20, 20.5]);
echo formatPrice($total);
echo "<br>";
