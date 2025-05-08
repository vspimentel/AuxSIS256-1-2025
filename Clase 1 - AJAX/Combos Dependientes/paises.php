<?php
include 'conexion.php';
$tipo = $_GET['tipo'];
$sql = "SELECT * FROM paises";
$resultado = $con->query($sql);
if ($tipo == 'html') {
    while ($ciudad = $resultado->fetch_assoc()) { ?>
        <option value="<?= $ciudad['id'] ?>"><?= $ciudad['nombre'] ?></option>
<?php }
} else if ($tipo == 'json') {
    $paises = [];
    while ($ciudad = $resultado->fetch_assoc()) {
        $paises[] = $ciudad;
    }
    echo json_encode($paises);
}
