<?php
session_start();

//vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    //vérification des identifiants
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['user'] = $username; // Stocke le user dans la session
        header('Location: dashboard.php'); // Redirection
        exit;
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<form method="post">
    <label>Nom d'utilisateur :</label>
    <input type="text" name="username" required>
    <br>
    <label>Mot de passe :</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Se connecter</button>
</form>

<?php
//message d'erreur si identifiants incorrects
if (!empty($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>