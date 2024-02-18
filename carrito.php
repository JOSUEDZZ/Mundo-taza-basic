<?php
session_start();

if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$userId = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : "user_" . md5($_SERVER['REMOTE_ADDR']);
setcookie('user_id', $userId, time() + (86400 * 30), "/"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carrito'])) {
    $producto_id = isset($_POST['producto_id']) ? $_POST['producto_id'] : null;
    $producto_nombre = isset($_POST['producto_nombre']) ? $_POST['producto_nombre'] : null;
    $producto_precio = isset($_POST['producto_precio']) ? $_POST['producto_precio'] : null;

    if ($producto_id !== null && $producto_nombre !== null && $producto_precio !== null) {
        $_SESSION['carrito'][] = array(
            'id' => $producto_id,
            'nombre' => $producto_nombre,
            'precio' => $producto_precio
        );

        setcookie('carrito_' . $userId, serialize($_SESSION['carrito']), time() + 3600, '/');
    } else {
        echo "Error: Datos de producto no válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="estilos/styleCarrito.css">
</head>
<body>

    <header>
        <div class="header-icons">
            <a href="bd.php" id="regresar-icon">
                <img src="imagenes\outline_arrow_back_white_24dp.png" alt="Atrás">
            </a>
            <h1>Carrito de compras</h1>
            <a href="carrito.php" id="carrito-icon">
                <img src="imagenes\outline_shopping_cart_white_24dp.png" alt="Carrito de Compras">
            </a>
        </div>
    </header>
    <section class="container">
        <h2>Productos en el Carrito</h2>
        <?php
        $totalPrecio = 0; 

        if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $producto) {
                if (is_array($producto) && isset($producto['nombre']) && isset($producto['precio'])) {
                    $imagenPath = "imagenes/{$producto['id']}.jpg"; 
                    echo "<div>";
                    echo "<img src='{$imagenPath}' alt='{$producto['nombre']}' style='max-width: 100px;'>";
                    echo "<p>{$producto['nombre']} - {$producto['precio']}</p>";
                    echo "</div>";

                    $totalPrecio += $producto['precio'];
                } else {
                    echo "<p>Producto inválido en el carrito.</p>";
                }
            }
        } else {
            echo "<p>El carrito está vacío.</p>";
        }
        ?>
    </section>

    <footer>
        <p>Total: $<?php echo number_format($totalPrecio, 2); ?></p>
        <a href="bd.php"> 
    </footer>

</body>
</html>
