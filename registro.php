<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['newUsername'] ?? '';
    $newPassword = password_hash($_POST['newPassword'] ?? '', PASSWORD_DEFAULT);

    $_SESSION['username'] = $newUsername;
    $_SESSION['password'] = $newPassword;

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos/registro.css">
</head>
<body>

    <form method="POST" action="registro.php">
        <h2>Registrarse</h2>
        <label for="newUsername">Nuevo Usuario:</label>
        <input type="text" id="newUsername" name="newUsername" required>

        <label for="newPassword">Nueva Contraseña:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <button type="submit">Registrarse</button>
    </form>

    <p class="redirect">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>

</body>
</html>
