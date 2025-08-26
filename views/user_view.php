<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>

<body>
    <h1>Listado de Usuarios</h1>
    <ul>
        <?php
        foreach ($users as $user):
        ?>
            <li>
                <?php echo htmlspecialchars($user['nombre']); ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>