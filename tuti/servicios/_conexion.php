<?php
$con = mysqli_connect("localhost", "root", "", "sistema_ecommerce");
if (!$con) {
    die("Error de conexión");
}