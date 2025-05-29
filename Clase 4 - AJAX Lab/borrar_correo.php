<?php

include 'conexion.php';
$id = $_POST['id'];

$sql = "DELETE FROM correos WHERE id = $id";
$resultado = $con->query($sql);

if ($resultado) {
    echo json_encode([
        "status" => "success",
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No se pudo borrar"
    ]);
}
