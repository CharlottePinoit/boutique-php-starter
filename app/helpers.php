<?php

function e(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function view(string $template, array $data = []): void
{
    // Transforme ['title' => 'X'] en $title = 'X'
    extract($data);

    // Capture le HTML de la vue
    ob_start();
    require __DIR__ . "/../views/$template.php";
    $content = ob_get_clean();

    // Injecte dans le layout
    require __DIR__ . '/../views/layout.php';
}

function redirect(string $url): void
{
    header("Location: $url");
    exit;
}
