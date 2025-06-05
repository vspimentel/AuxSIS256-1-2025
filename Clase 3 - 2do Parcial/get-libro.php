<?php
include 'conexion.php';
$id = $_GET['id'];
$sql = "SELECT l.imagen, l.titulo, l.autor, e.editorial, l.anio 
FROM libros l 
INNER JOIN editoriales e ON e.id = l.ideditorial 
WHERE l.id = $id";
$resultado = $con->query($sql);
$libro = $resultado->fetch_assoc();
?>

<div class="libro">
    <div class="row" style="gap: 20px;">
        <div>
            <img src="images/<?= $libro['imagen'] ?>">
        </div>
        <div class="col">
            <div><b>Titulo:</b> <?= $libro['titulo'] ?></div>
            <div><b>Autor:</b> <?= $libro['autor'] ?></div>
            <div><b>Editorial:</b> <?= $libro['editorial'] ?></div>
            <div><b>Año:</b> <?= $libro['anio'] ?></div>
        </div>
    </div>
</div>