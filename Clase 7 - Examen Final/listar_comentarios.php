<?php
session_start();
include 'conexion.php';
if (!isset($_SESSION['nivel'])) {
    echo "<div class='error'>No tienes permiso para acceder a esta página.</div>";
    exit();
}
$uid = $_SESSION['nivel'];
$carrera = isset($_GET['carrera']) ? $_GET['carrera'] : null;
$sql = "SELECT l.id, l.imagen, l.titulo, l.autor FROM libros l ";

$resultado = $con->query($sql);
?>

<div class="libros">

    <table id="tablaCorreos" border="1">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($libro = $resultado->fetch_assoc()) : ?>
                <tr>
                    <td><img src="images/<?= $libro['imagen']; ?>" height="80"></td>
                    <td><?= $libro['titulo']; ?></td>
                    <td><?= $libro['autor']; ?></td>
                    <td>
                        <div class="col">
                            <?php
                            $sql = "SELECT * FROM comentarios WHERE idlibro = " . $libro['id'];
                            $resultadoComentarios = $con->query($sql);
                            while ($comentario = $resultadoComentarios->fetch_assoc()) : ?>
                                <div> <?php echo $comentario['comentario']; ?></div>
                            <?php endwhile; ?>
                            <div class="button" onclick="mostrarModalComentario(<?= $libro['id']; ?>)">Insertar comentario</div>
                        </div>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>