<?php
include 'conexion.php';
$sql = "SELECT * FROM editoriales";
$resultado = $con->query($sql);
?>

<form action="javascript:guardarLibro()" class="col" id="formularioLibro">
    <label>Imagen</label>
    <input type="file" name="imagen" />
    <label>Título</label>
    <input type="text" name="titulo" />
    <label>Autor</label>
    <input type="text" name="autor" />
    <label>Año</label>
    <input type="number" name="anio" />
    <label>Editorial</label>
    <select name="editorial">
        <?php while ($libro = $resultado->fetch_assoc()) : ?>
            <option value="<?= $libro['id'] ?>"><?= $libro['editorial'] ?></option>
        <?php endwhile ?>
    </select>
    <label>Carrera</label>
    <select name="carrera"></select>
    <button>Guardar</button>
</form>