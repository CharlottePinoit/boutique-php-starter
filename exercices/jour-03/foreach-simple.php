<?php
$firstNames = ['Pierre', 'Marie', 'Paul', 'Julie', 'Lucas'];
$i = 1;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Foreach simple</title>
</head>

<body>

    <ul>
        <?php foreach ($firstNames as $firstName): ?>
            <li><?= $i . '. ' . $firstName; ?></li>
            <?php $i++; ?>
        <?php endforeach; ?>
    </ul>

</body>

</html>