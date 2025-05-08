<?php
include 'conexion.php';
$tipo = $_GET['tipo'];
$sql = "SELECT * FROM correos WHERE bandeja = '$tipo'";
$resultado = $con->query($sql);
?>

<table id="tablaCorreos" border="1">
    <thead>
        <tr>
            <th>Correo</th>
            <th>Asunto</th>
            <th>Estado</th>
            <th>Operación</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($correo = $resultado->fetch_assoc()) : ?>
            <tr>
                <td><?= $correo['correo']; ?></td>
                <td><?= $correo['asunto']; ?></td>
                <td><?= $correo['estado'] == 'P' ? "Pendiente" : 'Enviado' ?></td>
                <td>
                    <button class="boton ver" id="<?= $correo['id']; ?>" style="color: white; background-color: rgb(122, 122, 227); border: 1px solid blue; width: min-content">
                        Ver
                    </button>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>