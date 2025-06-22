<?php
include 'conexion.php';
$idlibro = $_POST['idlibro'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO comentarios (idlibro, comentario) 
VALUES ($idlibro, '$comentario')";

$con->query($sql);

$respuesta = [
    "status" => "success",
];

echo json_encode($respuesta);
