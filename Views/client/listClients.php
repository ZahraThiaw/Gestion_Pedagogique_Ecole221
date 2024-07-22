<!-- views/clients/list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des clients</title>
</head>
<body>
    <h1>Liste des clients</h1>
    <ul>
        <?php foreach ($clients as $client): ?>
            <li><?= htmlspecialchars($client->name) ?> <?= htmlspecialchars($client->firstname) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
