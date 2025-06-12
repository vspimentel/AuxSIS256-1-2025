<?php
include 'conexion.php';
$materia = $_GET['materia'];
$sql = "SELECT * FROM alumnos WHERE materia = '$materia'";
$resultado = $con->query($sql);
$i = 1;
?>

<table border="1" class="calificaciones">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Nombres y apellidos</th>
            <th>Calificación</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($alumno = $resultado->fetch_assoc()) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $alumno['nombres_apellidos']; ?></td>
                <td><input id="<?= $alumno['id'] ?>" class="calificacion" value="<?= $alumno['calificacion'] ?>"></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile ?>
    </tbody>
</table>