<?php
include 'conexion.php';
$no = $_GET['no'];
$materia = $_GET['materia'];
$sql = "SELECT * FROM alumnos WHERE materia = '$materia'";
$resultado = $con->query($sql);
?>

<table border="1">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Fotografía</th>
            <?php for ($i = 0; $i < $no; $i++) : ?>
                <th>Cuadro <?= $i + 1 ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php while ($alumno = $resultado->fetch_assoc()) : ?>
            <tr>
                <td><img style="width: 80px;" src="images/<?= $alumno['fotografia']; ?>"></td>
                <td><?= $alumno['nombres_apellidos']; ?></td>
                <?php for ($i = 0; $i < $no; $i++) : ?>
                    <td></td>
                <?php endfor; ?>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>