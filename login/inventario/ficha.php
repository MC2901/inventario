<link rel="stylesheet" type="text/css" href="../css/ficha.css">
</link>
<?php

//conexion a la base de datos con 4 parametros (servidor, usuarioServidor, contraseña usuario y nombre de la base de datos)
if (mysqli_connect('localhost', 'root', '', 'login')) {
    print "<section class='ficha'>";
    print "<h1>Detalles</h1>";


    if (isset($_GET['categoria'])) {
        $categoryCode = $_GET['categoria'];

        //guardo los datos de conexion
        $connectionDB = mysqli_connect('localhost', 'root', '', 'login');
        //guardo la consulta que quiero hacerle a la base de datos
        $queryDB = "SELECT codigoProducto, nombreProducto, precioProducto, descripcionProducto, categoriaProducto, cantidadProducto, fotoProducto,detallesProducto FROM productos WHERE codigoProducto=$categoryCode";

        //guardo el resultado de la consulta de base de datos
        if ($result = mysqli_query($connectionDB, $queryDB)) {
            //divide el resultado
            while ($rowDB = mysqli_fetch_array($result)) {
                print "<div>";
                print "<h2>$rowDB[nombreProducto]</h2>";
                print "<p>Precio: $rowDB[precioProducto]</p>";
                print "<p>Descripcion: $rowDB[descripcionProducto]</p>";
                print "<p>Stock: $rowDB[cantidadProducto]</p>";
                print "<p>Detalle: $rowDB[detallesProducto]</p>";
                print "<img src='../fotos/$rowDB[fotoProducto]' style='max-width: 27rem; height: auto;'>";
                print "</div>";

            }
            print "</section>";
        } else {
            print "<h1>Algo se rompio</h1>";
        }

    }

} else {
    print "<h1>Algo se rompio</h1>";
}

?>
