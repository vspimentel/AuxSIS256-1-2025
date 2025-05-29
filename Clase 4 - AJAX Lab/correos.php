<?php
session_start();
include 'conexion.php';
$tipo = $_GET['tipo'];
$uid = $_SESSION['id'];

if ($tipo == 'Recibido') {
    $sql = "SELECT c.id, u.email, c.asunto, c.estado 
            FROM 
                correos c 
                INNER JOIN usuarios u ON c.id_usuario = u.id 
            WHERE 
                c.id_usuario_destino = $uid AND
                c.estado = 'Enviado'";
} else if ($tipo == 'Enviado') {
    $sql = "SELECT c.id, u.email, c.asunto, c.estado
            FROM 
                correos c 
                INNER JOIN usuarios u ON c.id_usuario_destino = u.id 
            WHERE 
                c.id_usuario = $uid AND
                c.estado = 'Enviado'";
} else if ($tipo == 'Pendiente') {
    $sql = "SELECT c.id, u.email, c.asunto, c.estado
            FROM 
                correos c 
                INNER JOIN usuarios u ON c.id_usuario_destino = u.id 
            WHERE 
                c.id_usuario = $uid AND
                c.estado = 'Pendiente'";
}
$resultado = $con->query($sql);
?>

<table id="tablaCorreos" border="1">
    <thead>
        <tr>
            <th>Correo</th>
            <th>Asunto</th>
            <th>Operación</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($correo = $resultado->fetch_assoc()) : ?>
            <tr>
                <td><?= $correo['email']; ?></td>
                <td><?= $correo['asunto']; ?></td>
                <td>
                    <?php if ($tipo == 'Pendiente') : ?>
                        <button class="boton" onclick="enviarBorrador(<?= $correo['id'] ?>)" style="color: white; background-color: rgb(122, 122, 227); border: 1px solid blue; width: min-content">
                            Enviar
                        </button>
                    <?php else : ?>
                        <button class="boton" onclick="mostrarCorreo(<?= $correo['id'] ?>)" style="color: white; background-color: rgb(122, 122, 227); border: 1px solid blue; width: min-content">
                            Ver
                        </button>
                        <button class="boton" onclick="borrarCorreo(<?= $correo['id'] ?>, '<?= $tipo ?>')" style="color: white; background-color: rgb(122, 122, 227); border: 1px solid blue; width: min-content">
                            Borrar
                        </button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>