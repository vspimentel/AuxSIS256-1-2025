let overlays = document.querySelectorAll(".overlay");
let principal = document.querySelector("#principal");

inicio();

function mostrarModalLogin() {
  let overlay = document.querySelector("#overlayLogin");
  overlay.style.display = "flex";
}

function mostrarModalComentario(id) {
  fetch(`mostrar_libro.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      let overlay = document.querySelector("#overlayComentario");
      let titulo = document.querySelector("#titulo");
      let idlibro = document.querySelector("#idlibro");
      let autor = document.querySelector("#autor");
      titulo.innerHTML = data.titulo;
      autor.innerHTML = data.autor;
      idlibro.value = data.id;
      overlay.style.display = "flex";
    });
}

let cerrarBtns = document.querySelectorAll(".cerrar");

cerrarBtns.forEach((btn) => {
  btn.addEventListener("click", function () {
    overlays.forEach((overlay) => {
      overlay.style.display = "none";
    });
  });
});

function autenticar() {
  let formLogin = document.querySelector("#formLogin");
  let data = new FormData(formLogin);
  fetch(`login.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        let overlay = document.querySelector("#overlayLogin");
        let autenticacion = document.querySelector("#autenticacion");
        autenticacion.innerHTML = `
          <div>Bienvenido ${data.usuario.nombre}</div>
          <div class="modificable button" onclick="cerrarSesion()">
            Cerrar sesión
          </div>
        `;
        overlay.style.display = "none";
        formLogin.reset();
      } else if (data.status === "error") {
        const message = data.message;
        alert(message);
      }
    });
}

function pregunta2() {
  fetch(`colores.html`)
    .then((response) => response.text())
    .then((data) => {
      principal.innerHTML = data;
      asignarFuncionColores();
    });
}

let color = "";
function asignarFuncionColores() {
  let cells = document.querySelectorAll("td");

  cells.forEach((cell) => {
    cell.addEventListener("click", function (e) {
      e.stopPropagation();
      color = e.target.style.backgroundColor;
    });
  });
}

let elementosModificables = document.querySelectorAll(".modificable");
elementosModificables.forEach((elemento) => {
  elemento.addEventListener("click", function (e) {
    if (color) {
      e.target.style.backgroundColor = color;
      color = "";
    }
  });
});

function inicio() {
  fetch(`inicio.html`)
    .then((response) => response.text())
    .then((data) => {
      principal.innerHTML = data;
    });
}

function pregunta3() {
  filtrarLibros();
}

function filtrarLibros(carrera = null) {
  const url = carrera ? `listar.php?carrera=${carrera}` : "listar.php";
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      principal.innerHTML = data;
      asignarFuncionesLista();
    });
}

function asignarFuncionesLista() {
  let btnsEditar = document.querySelectorAll(".editar");
  let btnsEliminar = document.querySelectorAll(".borrar");
  btnsEditar.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      const id = e.target.id;
      editarLibro(id);
    });
  });
  btnsEliminar.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      const id = e.target.id;
      confirmarEliminar(id);
    });
  });
}

function confirmarEliminar(id) {
  let overlay = document.querySelector("#overlayBorrar");
  let btnEliminar = document.querySelector("#btnBorrar");
  btnEliminar.setAttribute("data-id", id);
  overlay.style.display = "flex";
}

function borrarLibro(target) {
  let id = target.getAttribute("data-id");
  fetch(`borrar_libro.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        let overlay = document.querySelector("#overlayBorrar");
        overlay.style.display = "none";
        pregunta3();
      } else if (data.status === "error") {
        const message = data.message;
        alert(message);
      }
    });
}

function editarLibro(id) {
  fetch(`mostrar_libro.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      let overlay = document.querySelector("#overlayEditar");
      let titulo = document.querySelector("#titulo");
      let autor = document.querySelector("#autor");
      let anio = document.querySelector("#anio");
      let carrera = document.querySelector("#carrera");
      let editorial = document.querySelector("#editorial");
      let id = document.querySelector("#id");
      titulo.value = data.titulo;
      autor.value = data.autor;
      carrera.value = data.idcarrera;
      anio.value = data.anio;
      id.value = data.id;
      editorial.value = data.ideditorial;
      overlay.style.display = "flex";
    });
}

function actualizarLibro() {
  let formEditar = document.querySelector("#formEditar");
  let data = new FormData(formEditar);
  fetch(`actualizar_libro.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        let overlay = document.querySelector("#overlayEditar");
        overlay.style.display = "none";
        pregunta3();
      } else if (data.status === "error") {
        const message = data.message;
        alert(message);
      }
    });
}

function pregunta4() {
  fetch(`listar_comentarios.php`)
    .then((response) => response.text())
    .then((data) => {
      principal.innerHTML = data;
    });
}

function comentar() {
  let formComentario = document.querySelector("#formComentario");
  let data = new FormData(formComentario);
  fetch(`agregar_comentario.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        overlay.style.display = "none";
        pregunta4();
      } else if (data.status === "error") {
        const message = data.message;
        alert(message);
      }
    });
}

function cerrarSesion() {
  fetch(`cerrar_sesion.php`)
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        let autenticacion = document.querySelector("#autenticacion");
        autenticacion.innerHTML = `
            <div id="login" class="modificable" onclick="mostrarModalLogin()">
              Iniciar sesión
            </div>`;
      }
    });
}
