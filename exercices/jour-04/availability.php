<?php
$stock = 5;
$active = true;
$promoEndDate = "2024-12-31";

// Availability
$isAvailable = ($stock > 0 && $active === true);

// Promotion
$today = new DateTime();
$promoEnd = new DateTime($promoEndDate);
$isOnSale = ($today < $promoEnd);

// Display status
if ($isAvailable) {
    echo "Product is available<br>";
} else {
    echo "Product is unavailable<br>";
}

if ($isOnSale) {
    echo "Product is on sale<br>";
} else {
    echo "Product is not on sale<br>";
}
