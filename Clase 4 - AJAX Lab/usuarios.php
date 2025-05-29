<?php
include 'conexion.php';
session_start();
$uid = $_SESSION['id'];
$sql = "SELECT id, email, rol, estado FROM usuarios WHERE id != $uid";;
$resultado = $con->query($sql);
?>

<table id="tablaCorreos" border="1">
    <thead>
        <tr>
            <th>Email</th>
            <th>Rol</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($usuario = $resultado->fetch_assoc()) : ?>
            <tr>
                <td><?= $usuario['email']; ?></td>
                <td><?= $usuario['rol'] == "admin" ? "Administrador" : "Usuario" ?></td>
                <td><?= $usuario['estado'] ? "<button onclick='cambiarEstadoUsuario({$usuario['id']}, 0)'>Desactivar</button>" : "<button onclick='cambiarEstadoUsuario({$usuario['id']}, 1)'>Activar</button>" ?></td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>