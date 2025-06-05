<?php
include 'conexion.php';
$sql = "SELECT id, imagen FROM libros";
$resultado = $con->query($sql);
?>
<div class="btn-opciones btn-op-principal">Opciones</div>
<div class="col" style="gap: 10px; width: 100%; padding: 10px;">
    <?php while ($libros = $resultado->fetch_assoc()) : ?>
        <img class="libro" src="images/<?= $libros['imagen'] ?>" id="<?= $libros['id'] ?>" style="height:50px; width:50px; cursor: pointer;" onclick="getLibro(<?= $libros['id'] ?>)">
    <?php endwhile ?>
</div>