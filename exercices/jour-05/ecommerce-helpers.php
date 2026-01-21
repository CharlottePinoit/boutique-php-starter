<?php

function calculateIncludingTax(float $priceExcludingTax, float $vat = 20): float
{
    return $priceExcludingTax * (1 + $vat / 100);
}

function calculateDiscount(float $price, float $percentage): float
{
    return $price - ($price * $percentage / 100);
}

function calculateTotal(array $cart): float
{
    return array_sum($cart);
}

function formatPrice(float $amount): string
{
    return number_format($amount, 2, ',', ' ') . ' €';
}

function formatDate(string $date): string
{
    return date('d F Y', strtotime($date));
}

function displayStockStatus(int $stock): string
{
    if ($stock > 0) {
        return '<span style="color: green;">En stock</span>';
    }

    return '<span style="color: red;">Rupture de stock</span>';
}

function displayBadges(array $product): string
{
    $badges = '';

    if ($product['price'] < 50) {
        $badges .= '<span style="background: green; color: white; padding: 3px;">Petit prix</span> ';
    }

    if (!$product['inStock']) {
        $badges .= '<span style="background: red; color: white; padding: 3px;">Rupture</span> ';
    }

    return $badges;
}

function validateEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validatePrice(mixed $price): bool
{
    return is_numeric($price) && $price > 0;
}

function dump_and_die(mixed ...$vars): void
{
    echo '<pre style="background:#1e1e1e;color:#4ec9b0;padding:20px;border-radius:5px;">';

    foreach ($vars as $var) {
        echo "Type: " . gettype($var) . PHP_EOL;

        if (is_string($var)) {
            echo "Length: " . strlen($var) . PHP_EOL;
        }

        echo "Value:" . PHP_EOL;
        var_dump($var);
        echo PHP_EOL . str_repeat('-', 30) . PHP_EOL;
    }

    echo '</pre>';
    die();
}
