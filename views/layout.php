<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Ma Boutique' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>


<body>
    <header class="header">
        <div class="container header__container">
            <a href="/" class="header__logo">🛍️ MaBoutique</a>
            <nav class="header__nav">
                <a href="/" class="header__nav-link">Accueil</a>
                <a href="/produits" class="header__nav-link">Catalogue</a>
                <a href="/contact" class="header__nav-link">Contact</a>
            </nav>
            <div class="header__actions">
                <a href="/panier" class="header__cart">🛒
                    <span class="header__cart-badge"><?= isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0 ?></span>
                </a>
                <a href="/connexion" class="btn btn--primary btn--sm">Connexion</a>
            </div>
            <button class="header__menu-toggle">☰</button>
        </div>
    </header>

    <main>
        <?php if (isset($flash)): ?>
            <div class="alert alert-<?= $flash['type'] ?>">
                <?= $flash['message'] ?>
            </div>
        <?php endif; ?>

        <?= $content ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Ma Boutique</p>
    </footer>
</body>

</html>