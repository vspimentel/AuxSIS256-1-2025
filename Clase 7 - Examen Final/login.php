<?php
session_start();
include 'conexion.php';
$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE usuario = '$email' AND password = '$password'";
$resultado = $con->query($sql);
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    echo json_encode(['status' => 'error', 'message' => 'Correo o contraseña incorrectos']);
    exit;
}

$_SESSION['nivel'] = $usuario['nivel'];
$_SESSION['nombre'] = $usuario['nombrecompleto'];

echo json_encode([
    'status' => 'success',
    'usuario' => [
        'nombre' => $usuario['nombrecompleto'],
    ]
]);
