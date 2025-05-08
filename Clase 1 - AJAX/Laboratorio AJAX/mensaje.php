<?php
include 'conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM correos WHERE id = $id";
$resultado = $con->query($sql);
$correo = $resultado->fetch_assoc();

echo json_encode($correo);
