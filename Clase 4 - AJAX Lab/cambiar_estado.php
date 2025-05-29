<?php

include 'conexion.php';
$id = $_POST['id'];
$estado = $_POST['estado'];

$sql = "UPDATE usuarios SET estado = $estado WHERE id = $id";
$resultado = $con->query($sql);

if ($resultado) {
    echo json_encode([
        "status" => "success",
        "message" => "Estado actualizado correctamente."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error al actualizar el estado."
    ]);
}
