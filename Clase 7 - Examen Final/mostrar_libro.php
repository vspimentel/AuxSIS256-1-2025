<?php
include 'conexion.php';
$id = $_GET['id'];

$sql = "SELECT
    l.id,
    l.imagen,
    l.titulo,
    l.autor,
    e.editorial,
    e.id AS ideditorial,
    l.anio,
    c.carrera,
    c.id AS idcarrera
FROM 
    libros l 
    INNER JOIN editoriales e ON l.ideditorial = e.id 
    INNER JOIN carreras c ON l.idcarrera = c.id
WHERE 
    l.id = $id";
$resultado = $con->query($sql);
$libro = $resultado->fetch_assoc();

$data = [
    'id' => $libro['id'],
    'imagen' => $libro['imagen'],
    'titulo' => $libro['titulo'],
    'autor' => $libro['autor'],
    'editorial' => $libro['editorial'],
    'anio' => $libro['anio'],
    'carrera' => $libro['carrera'],
    'ideditorial' => $libro['ideditorial'],
    'idcarrera' => $libro['idcarrera'],
];

echo json_encode($data);
