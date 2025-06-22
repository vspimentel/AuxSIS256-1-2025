<?php
session_start();
include 'conexion.php';
$sql = "SELECT * FROM carreras";
$resultadoCarreras = $con->query($sql);
$sql = "SELECT * FROM editoriales";
$resultadoEditoriales = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="overlay" id="overlayLogin">
    <form class="modal" id="formLogin">
      <div class="cerrar">X</div>
      <label>Correo</label>
      <input type="email" name="email" />
      <label>Contraseña</label>
      <input type="password" name="password" />
      <div class="button" onclick="autenticar()">Iniciar sesión</div>
    </form>
  </div>
  <div class="overlay" id="overlayEditar">
    <form class="modal" id="formEditar">
      <div class="cerrar">X</div>
      <input type="hidden" name="id" id="id" />
      <label>Título</label>
      <input type="text" name="titulo" id="titulo" />
      <label>Autor</label>
      <input type="text" name="autor" id="autor" />
      <label>Editorial</label>
      <select name="editorial" id="editorial">
        <?php while ($editorial = $resultadoEditoriales->fetch_assoc()) : ?>
          <option value="<?= $editorial['id'] ?>"><?= $editorial['editorial'] ?></option>
        <?php endwhile; ?>
      </select>
      <label>Año</label>
      <input type="number" name="anio" id="anio" />
      <label>Carrera</label>
      <select name="carrera" id="carrera">
        <?php while ($carrera = $resultadoCarreras->fetch_assoc()) : ?>
          <option value="<?= $carrera['id'] ?>"><?= $carrera['carrera'] ?></option>
        <?php endwhile; ?>
      </select>
      <label>Imagen</label>
      <input type="file" name="imagen" />
      <div class="button" onclick="actualizarLibro()">Guardar</div>
    </form>
  </div>
  <div class="overlay" id="overlayBorrar">
    <div class="modal">
      <div class="cerrar">X</div>
      <strong style="margin-top: 10px;">¿Estás seguro de que quieres borrar este libro?</strong>
      <div class="row" style="width: 100%; justify-content: end;">
        <div class="button" id="btnBorrar" onclick="borrarLibro(this)">Borrar</div>
      </div>
    </div>
  </div>
  <div class="overlay" id="overlayComentario">
    <form class="modal" id="formComentario">
      <div class="cerrar">X</div>
      <input type="hidden" name="idlibro" id="idlibro" />
      <strong id="titulo"></strong>
      <small id="autor"></small>
      <label>Comentario</label>
      <textarea name="comentario" style="width: 100%" rows="4"></textarea>
      <div class="button" onclick="comentar()">Enviar comentario</div>
    </form>
  </div>

  <div class="container">
    <div id="menu" class="modificable">
      <img src="images/escudo.png" />
      <a href="javascript:inicio()">Inicio</a>
      <a href="javascript:pregunta2()">Pregunta 2</a>
      <a href="javascript:pregunta3()">Pregunta 3</a>
      <a href="javascript:pregunta4()">Pregunta 4</a>
    </div>
    <div class="main">
      <div id="navegacion" class="modificable">
        <div class="navbar">
          <a href="javascript:inicio()">Inicio</a>
          <a href="javascript:pregunta2()">Pregunta 2</a>
          <a href="javascript:pregunta3()">Pregunta 3</a>
          <a href="javascript:pregunta4()">Pregunta 4</a>
        </div>
        <div id="autenticacion" class="row">
          <?php if (isset($_SESSION['nombre'])): ?>
            <div>Bienvenido <?= $_SESSION['nombre'] ?></div>
            <div class="modificable button" onclick="cerrarSesion()">
              Cerrar sesión
            </div>
          <?php else: ?>
            <div id="login" class="modificable" onclick="mostrarModalLogin()">
              Iniciar sesión
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div id="principal" class="modificable">

      </div>
      <div id="pie" class="modificable">
        <div>Examen Final Tecnología y Desarrollo Web</div>
        <div>Facebook Twitter Linkendln</div>
      </div>
    </div>
  </div>
</body>
<script src="script.js"></script>

</html>