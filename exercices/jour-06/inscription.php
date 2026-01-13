<?php

$errors = []; //tableau pour enregister les messages d'erreurs

$values = [ // tableau pour mémoriser les infos et pré-remplir le formulaire
    'username' => '',
    'email' => ''
];
//traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //récupération des données
    $username = trim($_POST['username'] ?? ''); // on trim pour nelever les espaces possiblement cachés
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';

    // remplissage du tableau pour pré-remplir
    $values['username'] = $username;
    $values['email'] = $email;

    //validation/message d'erreur

    //username: 3-20 caractères, alphanumérique, erreur s'affiche si username n'est pas bon (!)
    if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $username)) {
        $errors['username'] = 'Le nom d’utilisateur doit contenir entre 3 et 20 caractères alphanumériques.';
    }
    //email: format valide, erreur s'affiche si mail pas valide (!)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Adresse email invalide.';
    }
    //mot de passe : min 8 caractères
    if (strlen($password) < 8) {
        $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères.';
    }
    //confirmation : identique au mot de passe
    if ($password !== $confirmation) {
        $errors['confirmation'] = 'Les mots de passe ne correspondent pas.';
    }
    //bonus si aucune erreur
    $success = '';
    if (empty($errors)) {
        $success = 'Inscription réussie.';
    }
};
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire avec messages d'erreurs</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }

        label {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h2>Inscription</h2>

    <form method="post" action="">
        <!-- Username -->
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($values['username']) ?>">
        <?php if (isset($errors['username'])): ?>
            <div class="error"><?= $errors['username'] ?></div>
        <?php endif; ?>

        <!-- Email -->
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($values['email']) ?>">
        <?php if (isset($errors['email'])): ?>
            <div class="error"><?= $errors['email'] ?></div>
        <?php endif; ?>

        <!-- Mot de passe -->
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
        <?php if (isset($errors['password'])): ?>
            <div class="error"><?= $errors['password'] ?></div>
        <?php endif; ?>

        <!-- Confirmation du mot de passe -->
        <label for="confirmation">Confirmer le mot de passe :</label>
        <input type="password" id="confirmation" name="confirmation">
        <?php if (isset($errors['confirmation'])): ?>
            <div class="error"><?= $errors['confirmation'] ?></div>
        <?php endif; ?>

        <!-- Bouton Envoyer -->
        <button type="submit">Envoyer</button>
        <?php if ($success): ?>
            <p style="color:green;"><?= $success ?></p>
        <?php endif; ?>
    </form>

</body>

</html>