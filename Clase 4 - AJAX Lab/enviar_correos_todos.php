<?php
session_start();
include 'conexion.php';
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$id_usuario = $_SESSION['id'];

$sql = "SELECT id FROM usuarios WHERE id != $id_usuario";
$resultado = $con->query($sql);

while ($usuario_destino = $resultado->fetch_assoc()) {
    $id_usuario_destino = $usuario_destino['id'];

    $sql = "INSERT INTO correos (id_usuario, id_usuario_destino, asunto, mensaje, estado) 
                   VALUES ($id_usuario, $id_usuario_destino, '$asunto', '$mensaje', 'Enviado')";

    $con->query($sql);
}

echo json_encode([
    "status" => "success",
]);
