<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Productos</title>
    <link rel="stylesheet" type="text/css" href="estilos/stylesbd.css">
</head>
<body>

    <header>
        <div class="header-icons">
            <a href="login.php" id="regresar-icon">
                <img src="imagenes\outline_arrow_back_white_24dp.png" alt="Atrás">
            </a>
            <h1>Tienda de Artículos</h1>
            <a href="carrito.php" id="carrito-icon">
                <img src="imagenes\outline_shopping_cart_white_24dp.png" alt="Carrito de Compras">
            </a>
        </div>
    </header>
    <section class="container">
        <?php
        session_start();

        if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        try {
            $conexion = new PDO("mysql:host=localhost;dbname=mundotaza", "root", "");

            $consulta = $conexion->query("SELECT * FROM productos");
            $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            if (count($productos) > 0) {
                echo "<ul class='productos-lista'>";
                foreach ($productos as $producto) {
                    $imagenPath = "imagenes/{$producto['id']}.jpg"; 

                    echo "<li class='producto'>";
                    echo "<img src='{$imagenPath}' alt='{$producto['nombre']}'>";
                    echo "<div class='producto-info'>";
                    echo "<h2 class='producto-nombre'>{$producto['nombre']}</h2>";
                    echo "<p class='producto-precio'>$ {$producto['precio']}</p>";

                    echo "<form method='POST' action='carrito.php'>";
                    echo "<input type='hidden' name='producto_id' value='{$producto['id']}'>";
                    echo "<input type='hidden' name='producto_nombre' value='{$producto['nombre']}'>";
                    echo "<input type='hidden' name='producto_precio' value='{$producto['precio']}'>";
                    echo "<button type='submit' name='carrito'>Agregar al Carrito</button>";
                    echo "</form>";

                    echo "<a href='detalles_producto.php?id={$producto['id']}' class='ver-detalles'>Ver Detalles</a>";
                    echo "</div>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No hay productos en la base de datos.</p>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }
        ?>
    </section>

    <footer>
    </footer>

</body>
</html>
