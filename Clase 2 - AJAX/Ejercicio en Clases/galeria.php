<?php
include 'conexion.php';
$sql = "SELECT imagen FROM libros";
$resultado = $con->query($sql);
?>

<div id="galeria">
    <?php while ($libro = $resultado->fetch_assoc()) : ?>
        <button class="boton">
            <img src="images/<?= $libro['imagen']; ?>">
        </button>
    <?php endwhile ?>
</div>