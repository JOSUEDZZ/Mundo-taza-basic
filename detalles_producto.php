<!-- detalles_producto.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" type="text/css" href="estilos/stylesbd.css">
</head>
<body>
<header>
        <div class="header-icons">
            <a href="bd.php" id="regresar-icon">
                <img src="imagenes\outline_arrow_back_white_24dp.png" alt="Atrás">
            </a>
            <h1>Detalles del producto</h1>
            <a href="carrito.php" id="carrito-icon">
                <img src="imagenes\outline_shopping_cart_white_24dp.png" alt="Carrito de Compras">
            </a>
        </div>
    </header>
    <div class="container">

        <?php
        if (isset($_GET['id'])) {
            $productoId = $_GET['id'];

            try {
                $conexion = new PDO("mysql:host=localhost;dbname=mundotaza", "root", "");

                // Obtener detalles básicos del producto
                $consultaProducto = $conexion->prepare("SELECT * FROM productos WHERE id = :id");
                $consultaProducto->bindParam(':id', $productoId);
                $consultaProducto->execute();
                $producto = $consultaProducto->fetch(PDO::FETCH_ASSOC);

                if ($producto) {
                    $imagenPath = "imagenes/{$producto['id']}.jpg"; // Ajusta la extensión de la imagen según el formato real

                    echo "<div class='producto-detalles'>";
                    echo "<img src='{$imagenPath}' alt='{$producto['nombre']}'>";
                    echo "<div class='producto-info'>";
                    echo "<h2 class='producto-nombre'>{$producto['nombre']}</h2>";
                    echo "<p class='producto-precio'>$ {$producto['precio']}</p>";

                    // Obtener detalles adicionales del producto
                    $consultaDetalles = $conexion->prepare("SELECT detalles FROM detalles WHERE id = :id");
                    $consultaDetalles->bindParam(':id', $productoId);
                    $consultaDetalles->execute();
                    $detalles = $consultaDetalles->fetchAll(PDO::FETCH_ASSOC);

                    if ($detalles) {
                        echo "<h3>Detalles adicionales:</h3>";
                        echo "<ul>";
                        foreach ($detalles as $detalle) {
                            echo "<li>{$detalle['detalles']}</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>No hay detalles adicionales para este producto.</p>";
                    }

                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p>No se encontraron detalles para este producto.</p>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            } finally {
                $conexion = null;
            }
        } else {
            echo "<p>No se especificó un ID de producto válido.</p>";
        }
        ?>
    </div>
</body>
</html>
