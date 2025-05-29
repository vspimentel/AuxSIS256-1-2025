<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit;
}
$rol = $_SESSION['rol'];
?>

<div class="overlay">
  <div class="modal">
    <div class="cerrar">X</div>
    <div id="de"></div>
    <div id="para"></div>
    <div id="asunto"></div>
    <div id="mensaje"></div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div style="width: 20%"></div>
    <div>
      <button
        class="boton"
        style="
          color: white;
          background-color: rgb(122, 122, 227);
          border: 1px solid blue;
        "
        onclick="cargarFormulario()">
        Redactar
      </button>
      <?php if ($rol == 'admin'): ?>
        <button
          class="boton"
          style="
          color: white;
          background-color: rgb(122, 122, 227);
          border: 1px solid blue;"
          onclick="cargarFormularioTodos()">
          Redactar a todos
        </button>
      <?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col" style="width: 20%">
      <?php if ($rol == 'admin') : ?>
        <button
          class="boton"
          style="border: 1px solid blue"
          onclick="cargarUsuarios()">
          Usuarios
        </button>
      <?php endif; ?>
      <button
        class="boton"
        style="border: 1px solid blue"
        onclick="cargarCorreos('Recibido')">
        Bandeja de entrada
      </button>
      <button
        class="boton"
        style="border: 1px solid orange"
        onclick="cargarCorreos('Enviado')">
        Bandeja de salida
      </button>
      <button
        class="boton"
        style="border: 1px solid orange"
        onclick="cargarCorreos('Pendiente')">
        Borradores
      </button>
    </div>
    <div
      style="width: 80%; border: 1px solid black; padding: 20px"
      id="central">
      <!-- <table id="tablaCorreos" border="1">
        <thead>
          <tr>
            <th>Correo</th>
            <th>Asunto</th>
            <th>Estado</th>
            <th>Operación</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="4">Sin resultados</td>
          </tr>
        </tbody>
      </table> -->
    </div>
  </div>
</div>