let contenido = document.querySelector("#contenido");
let overlay;
let central;

function pregunta1() {
  contenido.innerHTML = `<div class="card">
            <div>Examen final SIS25</div>
            <div>Estudiante: Pimentel Vito</div>
            <div>CU: 111-318</div>
            <div>
              Semestre:
              <span
                style="
                  border: 2px solid black;
                  background-color: yellow;
                  padding: 5px;
                "
                >1/2025</span
              >
            </div>
          </div>`;
}

function cargarLogin() {
  fetch(`login.html`)
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
    });
}

cargarLogin();

function login() {
  let formLogin = document.querySelector("#formLogin");
  let data = new FormData(formLogin);
  fetch(`login.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        cargarLayout();
        let rol = data.usuario.rol;
        if (rol === "admin") {
          cargarUsuarios();
        }
        if (rol === "user") {
          cargarCorreos("Recibido");
        }
      }
      if (data.status === "error") {
        const message = data.message;
        alert(message);
      }
    });
}

function cargarLayout() {
  fetch(`layout.php`)
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
      central = document.querySelector("#central");
      overlay = document.querySelector(".overlay");
      let botonCerrar = document.querySelector(".cerrar");
      botonCerrar.addEventListener("click", function () {
        overlay.style.display = "none";
      });
    });
}

function cargarUsuarios() {
  fetch(`usuarios.php`)
    .then((response) => response.text())
    .then((data) => {
      central.innerHTML = data;
    });
}

function cargarCorreos(tipo) {
  fetch(`correos.php?tipo=${tipo}`)
    .then((response) => response.text())
    .then((data) => {
      central.innerHTML = data;
    });
}

function cargarFormulario() {
  fetch(`form_correo.html`)
    .then((response) => response.text())
    .then((data) => {
      central.innerHTML = data;
    });
}

function cargarFormularioTodos() {
  fetch(`form_correo_todos.html`)
    .then((response) => response.text())
    .then((data) => {
      central.innerHTML = data;
    });
}

function enviarCorreo() {
  let formCorreo = document.querySelector("#formCorreo");
  let data = new FormData(formCorreo);
  data.append("estado", "Enviado");
  fetch(`enviar_correos.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        cargarCorreos("Enviado");
      } else {
        const message = data.message;
        alert(message);
      }
    });
}

function guardarCorreo() {
  let formCorreo = document.querySelector("#formCorreo");
  let data = new FormData(formCorreo);
  data.append("estado", "Pendiente");
  fetch(`enviar_correos.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        cargarCorreos("Pendiente");
      } else {
        const message = data.message;
        alert(message);
      }
    });
}

function enviarCorreoTodos() {
  let formCorreo = document.querySelector("#formCorreo");
  let data = new FormData(formCorreo);
  fetch(`enviar_correos_todos.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        cargarCorreos("Enviado");
      } else {
        const message = data.message;
        alert(message);
      }
    });
}

function cambiarEstadoUsuario(id, estado) {
  let data = new FormData();
  data.append("id", id);
  data.append("estado", estado);
  fetch(`cambiar_estado.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        cargarUsuarios();
      } else {
        const message = data.message;
        alert(message);
      }
    });
}

function enviarBorrador(id) {
  let data = new FormData();
  data.append("id", id);
  fetch(`enviar_borrador.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        cargarCorreos("Enviado");
      } else {
        const message = data.message;
        alert(message);
      }
    });
}

function mostrarCorreo(id) {
  fetch(`mostrar_correo.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      de.innerHTML = `De: ${data.de}`;
      para.innerHTML = `Para: ${data.para}`;
      asunto.innerHTML = `Asunto: ${data.asunto}`;
      mensaje.innerHTML = `Mensaje: ${data.mensaje}`;
      overlay.style.display = "flex";
    });
}

function borrarCorreo(id, estado) {
  let data = new FormData();
  data.append("id", id);
  fetch(`borrar_correo.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        cargarCorreos(estado);
      } else {
        const message = data.message;
        alert(message);
      }
    });
}
