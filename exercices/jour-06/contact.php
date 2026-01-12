<?php

$errors = [];
$name = $email = $message = "";

// Vérifie si le formulaire est envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation
    if ($name === '') {
        $errors[] = "Le nom est obligatoire.";
    }

    if ($email === '') {
        $errors[] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }

    if ($message === '') {
        $errors[] = "Le message est obligatoire.";
    } elseif (strlen($message) < 10) {
        $errors[] = "Le message doit contenir au moins 10 caractères.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
</head>
<body>

<h1>Formulaire de contact</h1>

<?php if (!empty($errors)) : ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error) : ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) : ?>
    <h2>Données reçues :</h2>
    <p><strong>Nom :</strong> <?= htmlspecialchars($name) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Message :</strong><br><?= nl2br(htmlspecialchars($message)) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <p>
        <label>Nom :</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
    </p>

    <p>
        <label>Email :</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">
    </p>

    <p>
        <label>Message :</label><br>
        <textarea name="message"><?= htmlspecialchars($message) ?></textarea>
    </p>

    <button type="submit">Envoyer</button>
</form>

</body>
</html>