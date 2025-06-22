<?php

session_start();
include 'conexion.php';
if (!isset($_SESSION['nivel'])) {
    echo json_encode(["status" => "error", "message" => "No estás registrado en la página."]);
    exit();
}

if ($_SESSION['nivel'] != 1) {
    echo json_encode(["status" => "error", "message" => "No tienes permiso para actualizar libros."]);
    exit();
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$carrera = $_POST['carrera'];
$anio = $_POST['anio'];

$sql = "SELECT imagen FROM libros WHERE id = '$id'";
$resultado = $con->query($sql);
$libro = $resultado->fetch_assoc();

$imagen = $libro['imagen'];
if (isset($_FILES['imagen'])) {
    $imagenFile = $_FILES['imagen'];
    $imagenName = $imagenFile['name'];
    $imagen = uniqid() . '_' . $imagenName;
    $temp = $imagenFile['tmp_name'];
    $filepath = "images/$imagen";
    move_uploaded_file($temp, $filepath);
    unlink("images/" . $libro['imagen']);
}

$sql = "UPDATE libros SET titulo = '$titulo', autor = '$autor', ideditorial = $editorial, idcarrera = $carrera, anio = $anio, imagen = '$imagen' WHERE id = '$id'";
if ($con->query($sql)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al actualizar el libro: " . $con->error]);
}
