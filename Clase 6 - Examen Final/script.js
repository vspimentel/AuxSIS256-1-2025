let materia = "SIS256";
let seccion = "Inicio";
let noLista = 0;
let contenido = document.querySelector("#contenido");
let titulo = document.querySelector("#titulo");

let opciones = document.querySelectorAll(".materia");

opciones.forEach((opcion) => {
  opcion.addEventListener("click", (e) => {
    materia = opcion.innerHTML;
    let selected = document.querySelector(".selected");
    selected.classList.remove("selected");
    e.target.classList.add("selected");
    switch (seccion) {
      case "Inicio":
      case "Informes":
        break;
      case "Lista":
        cargarLista();
        break;
      case "Horario":
        pregunta3();
        break;
      case "Calificaciones":
        pregunta4();
        break;
    }
  });
});

function pregunta2() {
  titulo.innerHTML = "Lista";
  seccion = "Lista";
  contenido.innerHTML = `
        <div id="formTabla">
            <label style="width: 100%">Nro de Cuadros</label>
            <input type="number" id="no" />
            <button onclick="cargarLista()">Obtener</button>
        </div>`;
}

function cargarLista() {
  let no = document.getElementById("no");
  noLista = no ? no.value : noLista;
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `lista.php?materia=${materia}&no=${noLista}`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      contenido.innerHTML = ajax.responseText;
      titulo.innerHTML = `Lista ${materia}`;
    }
  };
  ajax.send();
}

function pregunta3() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `horarios.php?materia=${materia}`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      contenido.innerHTML = ajax.responseText;
      titulo.innerHTML = `Horario ${materia}`;
      seccion = "Horario";
    }
  };
  ajax.send();
}

function pregunta4() {
  fetch(`calificaciones.php?materia=${materia}`)
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
      titulo.innerHTML = `Calificaciones ${materia}`;
      seccion = "Calificaciones";
      asignarFuncionesCalificaciones();
    });
}

function asignarFuncionesCalificaciones() {
  let calificaciones = document.querySelectorAll(".calificacion");

  calificaciones.forEach((calificacion) => {
    calificacion.addEventListener("change", function (e) {
      const id = e.target.id;
      const calificacion = e.target.value;
      let data = new FormData();
      data.append("id", id);
      data.append("calificacion", calificacion);
      var ajax = new XMLHttpRequest();
      ajax.open("POST", `actualizar-calificacion.php`, false);
      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          const respuesta = JSON.parse(ajax.responseText);
          if (respuesta.status == "success") {
            pregunta4();
          } else {
            alert(respuesta.message);
          }
        }
      };
      ajax.send(data);
    });
  });
}

function pregunta5() {
  fetch(`formulario-informe.html`)
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
      titulo.innerHTML = `Informes`;
      seccion = "Informes";
    });
}

function guardarInformes() {
  let form = document.querySelector("#formInforme");
  let data = new FormData(form);
  fetch(`informes.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message);
    });
}
