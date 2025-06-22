<?php
session_start();
include 'conexion.php';
if (!isset($_SESSION['nivel'])) {
    echo "<div class='error'>No tienes permiso para acceder a esta página.</div>";
    exit();
}

$uid = $_SESSION['nivel'];
$carrera = $_GET['carrera'] ?? null;
$sql = "SELECT
    l.id,
    l.imagen,
    l.titulo,
    l.autor,
    e.editorial,
    l.anio,
    c.carrera
FROM 
    libros l 
    INNER JOIN editoriales e ON l.ideditorial = e.id 
    INNER JOIN carreras c ON l.idcarrera = c.id";

$sql = $carrera ? "$sql WHERE l.idcarrera = '$carrera'" : $sql;
$resultado = $con->query($sql);

$sql = "SELECT * FROM carreras";
$resultadoCarreras = $con->query($sql);
?>

<div class="libros">
    <div class="filtros">
        <div class="button" onclick="filtrarLibros()">TODOS</div>
        <?php while ($carrera = $resultadoCarreras->fetch_assoc()) : ?>
            <div class="button" onclick="filtrarLibros('<?= $carrera['id'] ?>')">
                <?= $carrera['carrera'] ?>
            </div>
        <?php endwhile; ?>
    </div>
    <table id="tablaCorreos" border="1">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Año</th>
                <th>Carrera</th>
                <?php if ($uid == 1) : ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($libro = $resultado->fetch_assoc()) : ?>
                <tr>
                    <td><img src="images/<?= $libro['imagen']; ?>" height="80"></td>
                    <td><?= $libro['titulo']; ?></td>
                    <td><?= $libro['autor']; ?></td>
                    <td><?= $libro['editorial']; ?></td>
                    <td><?= $libro['anio']; ?></td>
                    <td><?= $libro['carrera']; ?></td>
                    <?php if ($uid == 1) : ?>
                        <td>
                            <div class="row" style="justify-content: center;">
                                <div class="button editar" style="background-color: yellow;" id="<?= $libro['id']; ?>">
                                    Editar
                                </div>
                                <div class="button borrar" style="background-color: red;" id="<?= $libro['id']; ?>">
                                    Borrar
                                </div>
                            </div>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>