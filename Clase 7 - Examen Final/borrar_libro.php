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

$id = $_GET['id'];

$sql = "DELETE FROM libros WHERE id = '$id'";
if ($con->query($sql)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al borrar el libro: " . $con->error]);
}
