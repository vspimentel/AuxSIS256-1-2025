<?php
include 'conexion.php';
$pais = $_GET['pais'];
$tipo = $_GET['tipo'];
$sql = "SELECT * FROM ciudades WHERE id_pais = $pais";
$resultado = $con->query($sql);
if ($tipo == 'html') {
    while ($pais = $resultado->fetch_assoc()) { ?>
        <option value="<?= $pais['id'] ?>"><?= $pais['nombre'] ?></option>
<?php }
} else if ($tipo == 'json') {
    $ciudades = [];
    while ($ciudad = $resultado->fetch_assoc()) {
        $ciudades[] = $ciudad;
    }
    echo json_encode($ciudades);
}
