<?php
include 'conexion.php';
$mes = $_POST['mes'];
$sis256 = $_POST['sis256'];
$sis258 = $_POST['sis258'];
$sis406 = $_POST['sis406'];

$sql = "INSERT INTO informes (mes, materia, porcentaje) VALUES 
('$mes', 'SIS256', $sis256),
('$mes', 'SIS258', $sis258),
('$mes', 'SIS406', $sis406)";

$resultado = $con->query($sql);

if ($resultado) {
    echo json_encode([
        "status" => "success",
        "message" => "Informe registrado correctamente."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error al registrar el informe."
    ]);
}
