<?php
include 'conexion.php';
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO correos (correo, asunto, mensaje, bandeja, estado) 
VALUES ('$correo', '$asunto', '$mensaje', 'salida', 'E')";

$con->query($sql);

$respuesta = [
    "status" => "success",
];

echo json_encode($respuesta);
