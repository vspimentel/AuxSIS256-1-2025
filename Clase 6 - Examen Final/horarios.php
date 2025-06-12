<?php
include 'conexion.php';
$materia = $_GET['materia'];
$sql = "SELECT dia, hora FROM horarios WHERE materia = '$materia'";
$resultado = $con->query($sql);

$horarios = [];
while ($horario = $resultado->fetch_assoc()) {
    $horarios[] = "{$horario['hora']} - {$horario['dia']}";
}

$horas = [
    8,
    9,
    10,
    11,
    12,
    13,
    14,
    15,
    16,
    17,
];

$dias = [
    'Lunes',
    'Martes',
    'Miércoles',
    'Jueves',
    'Viernes',
];
?>

<table border="1">
    <tr>
        <th>Hora</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
    </tr>
    <?php foreach ($horas as $hora) : ?>
        <tr>
            <th>
                <?= $hora ?> - <?= (string)($hora + 1) ?>
            </th>
            <?php foreach ($dias as $dia) : ?>
                <?php if (in_array("$hora - $dia", $horarios)): ?>
                    <td style="background-color: yellow"></td>
                <?php else: ?>
                    <td></td>
                <?php endif ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>