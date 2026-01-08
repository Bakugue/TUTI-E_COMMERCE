<?php
include('../_conexion.php');
session_start();
$response=new stdClass();

if (isset($_SESSION['codusu'])) {
	$codusu=$_SESSION['codusu'];
	$codpro=$_POST['codpro'];

	$sql="INSERT INTO PEDIDO (codusu,codpro,fecped,estado)
	VALUES ($codusu,$codpro,NOW(),1)";
	$result=mysqli_query($con,$sql);

	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar el producto";
	}
}else{
	$response->state=false;
	$response->detail="Inicia sesión primero";
}

header('Content-Type: application/json');
echo json_encode($response);