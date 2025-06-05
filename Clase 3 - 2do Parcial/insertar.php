<?php
include 'conexion.php';
$imagenFile = $_FILES['imagen'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$anio = $_POST['anio'];
$idEditorial = $_POST['editorial'];

$imagenName = $imagenFile['name'];
$imagen = uniqid() . '_' . $imagenName;
$temp = $imagenFile['tmp_name'];
$filepath = 'images/' . $imagen;

move_uploaded_file($temp, $filepath);

$sql = "INSERT INTO libros(imagen, titulo, autor, anio, ideditorial, idcarrera, idusuario) 
VALUES ('$imagen', '$titulo', '$autor', $anio, $idEditorial, 1, 0)";

$con->query($sql);

$respuesta = [
    "status" => "success",
];

echo json_encode($respuesta);
