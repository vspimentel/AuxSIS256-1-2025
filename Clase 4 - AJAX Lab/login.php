<?php
include 'conexion.php';
$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
$resultado = $con->query($sql);
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    echo json_encode(['status' => 'error', 'message' => 'Correo o contraseña incorrectos']);
    exit;
}

$estado = $usuario['estado'];
if (!$estado) {
    echo json_encode(['status' => 'error', 'message' => 'Usuario suspendido']);
    exit;
}

session_start();
$_SESSION['email'] = $usuario['email'];
$_SESSION['id'] = $usuario['id'];
$_SESSION['rol'] = $usuario['rol'];

echo json_encode([
    'status' => 'success',
    'message' => 'Inicio de sesión exitoso',
    'usuario' => [
        'email' => $usuario['email'],
        'id' => $usuario['id'],
        'rol' => $usuario['rol']
    ]
]);
exit;
