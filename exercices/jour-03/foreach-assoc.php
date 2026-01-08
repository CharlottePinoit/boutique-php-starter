<?php
$person = [
    'name' => 'Pierre',
    'age'  => 32,
    'city' => 'Paris',
    'job'  => 'Développeur'
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Foreach associatif</title>
</head>

<body>

    <ul>
        <?php foreach ($person as $key => $value): ?>
            <li><strong><?= $key; ?></strong> : <?= $value; ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>