<?php
session_start();
include 'conexion.php';
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$estado = $_POST['estado'];

$id_usuario = $_SESSION['id'];

$sql = "SELECT id FROM usuarios WHERE email = '$correo'";
$resultado = $con->query($sql);
$usuario_destino = $resultado->fetch_assoc();

if (!$usuario_destino) {
    echo json_encode([
        "status" => "error",
        "message" => "El usuario destino no existe."
    ]);
    exit;
}

$id_usuario_destino = $usuario_destino['id'];

if ($id_usuario_destino == $id_usuario) {
    echo json_encode([
        "status" => "error",
        "message" => "No puedes enviarte un correo a ti mismo."
    ]);
    exit;
}

$sql = "INSERT INTO correos (id_usuario, id_usuario_destino, asunto, mensaje, estado) 
VALUES ($id_usuario, $id_usuario_destino, '$asunto', '$mensaje', '$estado')";

$con->query($sql);

$respuesta = [
    "status" => "success",
];

echo json_encode($respuesta);
