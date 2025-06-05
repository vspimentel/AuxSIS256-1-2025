<?php
include 'conexion.php';
$sql = "SELECT l.imagen, l.titulo, l.autor, e.editorial, l.anio  FROM libros l INNER JOIN editoriales e ON e.id = l.ideditorial";
$resultado = $con->query($sql);
$data = [];
while ($libro = $resultado->fetch_assoc()) {
    $data[] = [
        'imagen' => $libro['imagen'],
        'titulo' => $libro['titulo'],
        'autor' => $libro['autor'],
        'editorial' => $libro['editorial'],
        'anio' => $libro['anio']
    ];
}
echo json_encode($data);
