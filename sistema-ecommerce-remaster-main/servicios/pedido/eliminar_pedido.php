<?php
// Intentamos conectar con la ruta relativa estándar
$ruta_conexion = '../_conexion.php';

if (file_exists($ruta_conexion)) {
    include($ruta_conexion);
} else {
    die("Error: No se encontró el archivo de conexión en: " . realpath($ruta_conexion));
}

if (isset($_POST['codped'])) {
    $codped = $_POST['codped'];

    // Consulta para eliminar el pedido
    $sql = "DELETE FROM pedido WHERE codped = $codped";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "ok";
    } else {
        echo "Error al intentar eliminar el registro: " . mysqli_error($con);
    }
} else {
    echo "No se recibió el código del pedido";
}

mysqli_close($con);
?>