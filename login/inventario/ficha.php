<!-- Carga de hoja de estilos CSS -->
<link rel="stylesheet" type="text/css" href="../css/ficha.css"></link>
<?php
// Conexión a la base de datos con 4 parámetros: servidor, usuarioServidor, contraseña usuario y nombre de la base de datos
if (mysqli_connect('localhost', 'root', '', 'login')) {
    // Impresión de la sección de detalles
    print "<section class='ficha'>";
    print "<h1>Detalles</h1>";

    // Verificación de existencia del parámetro "categoria"
    if (isset($_GET['categoria'])) {
        $categoryCode = $_GET['categoria'];

        // Guardado de los datos de conexión a la base de datos
        $connectionDB = mysqli_connect('localhost', 'root', '', 'login');
        // Definición de la consulta que se le hará a la base de datos
        $queryDB = "SELECT codigoProducto, nombreProducto, precioProducto, descripcionProducto, categoriaProducto, cantidadProducto, fotoProducto, detallesProducto FROM productos WHERE codigoProducto=$categoryCode";

        // Ejecución de la consulta y guardado del resultado
        if ($result = mysqli_query($connectionDB, $queryDB)) {
            // Iteración sobre los resultados obtenidos de la consulta
            while ($rowDB = mysqli_fetch_array($result)) {
                // Impresión de los detalles del producto
                print "<div>";
                print "<h2>$rowDB[nombreProducto]</h2>";
                print "<p>Precio: $rowDB[precioProducto]</p>";
                print "<p>Descripción: $rowDB[descripcionProducto]</p>";
                print "<p>Stock: $rowDB[cantidadProducto]</p>";
                print "<p>Detalles: $rowDB[detallesProducto]</p>";
                print "<img src='../fotos/$rowDB[fotoProducto]' style='max-width: 27rem; height: auto;'>";
                print "</div>";
            }
            // Cierre de la sección de detalles
            print "</section>";
        } else {
            // Impresión de mensaje de error si la consulta no se pudo ejecutar
            print "<h1>Algo salió mal</h1>";
        }
    }
} else {
    // Impresión de mensaje de error si no se pudo establecer la conexión a la base de datos
    print "<h1>Algo salió mal</h1>";
}
?>
