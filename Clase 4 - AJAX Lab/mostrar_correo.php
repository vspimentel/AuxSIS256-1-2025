<?php
include 'conexion.php';
$id = $_GET['id'];
$sql = "SELECT c.asunto, c.mensaje, c.estado, u.email AS de, ud.email AS para
FROM correos c
INNER JOIN usuarios u ON c.id_usuario = u.id
INNER JOIN usuarios ud ON c.id_usuario_destino = ud.id 
WHERE c.id = $id";
$resultado = $con->query($sql);
$correo = $resultado->fetch_assoc();

echo json_encode($correo);
