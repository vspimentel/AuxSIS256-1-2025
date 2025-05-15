let correos = document.querySelector("#correos");
let overlay = document.querySelector(".overlay");
let botonCerrar = document.querySelector(".cerrar");

async function cargarCorreos(tipo) {
  const response = await fetch("bandeja.php?tipo=" + tipo);
  const data = await response.text();
  correos.innerHTML = data;

  let botonesVer = document.querySelectorAll(".ver");
  botonesVer.forEach((boton) => {
    boton.addEventListener("click", function (e) {
      const id = e.target.id;
      fetch(`mensaje.php?id=${id}`)
        .then((response) => response.json())
        .then((data) => {
          correo.innerHTML = `De: ${data.correo}`;
          asunto.innerHTML = `Asunto: ${data.asunto}`;
          mensaje.innerHTML = `Mensaje: ${data.mensaje}`;
          overlay.style.display = "flex";
        });
    });
  });
}

botonCerrar.addEventListener("click", function () {
  overlay.style.display = "none";
});

overlay.addEventListener("click", function (e) {
  if (e.target === overlay) {
    overlay.style.display = "none";
  }
});

function cargarFormulario() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `form_correo.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      correos.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}

function enviarMensaje() {
  let formCorreo = document.querySelector("#formCorreos");
  let data = new FormData(formCorreo);
  var ajax = new XMLHttpRequest();
  ajax.open("POST", `guardar_correo.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      cargarCorreos("salida");
    }
  };
  ajax.send(data);
}
