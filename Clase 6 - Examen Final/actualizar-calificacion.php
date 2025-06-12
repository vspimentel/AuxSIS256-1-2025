<?php

include 'conexion.php';
$id = $_POST['id'];
$calificacion = $_POST['calificacion'];

$sql = "UPDATE alumnos SET calificacion = $calificacion WHERE id = $id";
$resultado = $con->query($sql);

if ($resultado) {
    echo json_encode([
        "status" => "success",
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error al actualizar la calificación."
    ]);
}
