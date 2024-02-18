<?php
session_start();

$storedUsername = $_SESSION['username'] ?? '';
$storedPasswordHash = $_SESSION['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && password_verify($password, $storedPasswordHash) && $username === $storedUsername) {
        // Almacena las credenciales en variables de sesión
        $_SESSION['username'] = $storedUsername;
        $_SESSION['authenticated'] = true;

        if (session_status() == PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }

        header("Location: bd.php");
        exit();
    } else {
        echo "error"; 
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos/stylesLogin.css">
</head>
<body>

    <form method="POST" action="login.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Iniciar Sesión</button>
        <p class="redirect">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
    </form>

</body>
</html>
