<?php
include('../_conexion.php'); // Verifica que tenga los dos puntos ..
$response = new stdClass();
$datos = [];
$i = 0;

$sql = "SELECT * FROM PRODUCTO WHERE estado = 1";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)){
    $obj = new stdClass();
    $obj->codpro = $row['codpro'];
    $obj->nompro = $row['nompro'];
    $obj->prepro = $row['prepro'];
    $obj->rutimapro = $row['rutimapro'];
    $datos[$i] = $obj;
    $i++;
}

$response->datos = $datos;
header('Content-Type: application/json');
echo json_encode($response);