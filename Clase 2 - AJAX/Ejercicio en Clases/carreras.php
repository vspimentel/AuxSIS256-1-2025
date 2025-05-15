<?php
include 'conexion.php';
$sql = "SELECT * FROM carreras";
$resultado = $con->query($sql);
$carreras = [];
while ($carrera = $resultado->fetch_assoc()) {
    $carreras[] = [
        'id' => $carrera['id'],
        'carrera' => $carrera['carrera']
    ];
}
$sql = "SELECT * FROM editoriales";
$resultado = $con->query($sql);
$editoriales = [];
while ($editorial = $resultado->fetch_assoc()) {
    $editoriales[] = [
        'id' => $editorial['id'],
        'editorial' => $editorial['editorial']
    ];
}

$data = [
    'carreras' => $carreras,
    'editoriales' => $editoriales
];

echo json_encode($data);
