<?php
include 'conexion.php';
$sql = "SELECT id, editorial FROM editoriales";
$resultado = $con->query($sql);
?>

<form class="col" style="padding: 10px;" id="formLibro">
    <label>Titulo</label>
    <input type="text" name="titulo" id="titulo" required>
    <label>Autor</label>
    <input type="text" name="autor" id="autor" required>
    <label>Editorial</label>
    <select name="editorial" id="editorial">
        <?php while ($editorial = $resultado->fetch_assoc()) : ?>
            <option value="<?= $editorial['id'] ?>"><?= $editorial['editorial'] ?></option>
        <?php endwhile; ?>
    </select>
    <label>Año</label>
    <input type="number" name="anio" id="anio" required>
    <label>Imagen</label>
    <input type="file" name="imagen" id="imagen" required>
    <button type="button" onclick="insertarLibro()">Crear</button>
</form>