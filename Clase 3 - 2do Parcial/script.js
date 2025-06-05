let subMenu = document.querySelector("#sub-menu");
let titulo = document.querySelector("#titulo");
let contenido = document.querySelector("#contenido");

function pregunta1() {
  fetch(`datos.html`)
    .then((response) => response.text())
    .then((data) => {
      subMenu.innerHTML = data;
      titulo.innerHTML = "Ejercicio 1";
    });
}

function crearTabla() {
  const filas = parseInt(document.querySelector("#filas").value);
  const columnas = parseInt(document.querySelector("#cols").value);
  let tabla = "<div class='tabla-inputs'>";
  tabla += "<table border='1'>";
  for (let i = 0; i < filas; i++) {
    tabla += "<tr>";
    for (let j = 0; j < columnas; j++) {
      tabla += `<td></td>`;
    }
    tabla += "</tr>";
  }
  tabla += "</table>";
  tabla += "</div>";
  contenido.innerHTML = tabla;

  let celdas = document.querySelectorAll("td");

  celdas.forEach((celda) => {
    celda.addEventListener("click", (e) => {
      let celdaSeleccionada = e.target;
      celdaSeleccionada.innerHTML = `<input type="text" style="width: 100px; height: 20px" />`;

      let input = e.target.querySelector("input");
      input.addEventListener("change", (e) => {
        let valor = e.target.value;
        celdaSeleccionada.innerHTML = valor;
      });
    });
  });
}

function pregunta2() {
  fetch(`datos-parrafos.html`)
    .then((response) => response.text())
    .then((data) => {
      subMenu.innerHTML = data;
      titulo.innerHTML = "Ejercicio 2";
    });
}

function crearParrafos() {
  const texto = document.querySelector("#texto").value;
  const fondo = document.querySelector("#fondo").value;
  const color = document.querySelector("#color").value;
  let parrafos = document.querySelector(".parrafos");
  if (!parrafos) {
    contenido.innerHTML = "";
    contenido.innerHTML += `<div class="parrafos"></div>`;
  }
  parrafos = document.querySelector(".parrafos");
  parrafos.innerHTML += `<div class="parrafo" style="background-color: ${fondo}; color: ${color};">${texto}</div>`;
}

function pregunta3() {
  fetch(`galeria.php`)
    .then((response) => response.text())
    .then((data) => {
      subMenu.innerHTML = data;
      titulo.innerHTML = "Ejercicio 3";
      let libros = document.querySelectorAll(".libro");
      libros.forEach((libro) => {
        libro.addEventListener("click", (e) => {
          let selectedLibro = document.querySelector(".selected");
          if (selectedLibro) {
            selectedLibro.classList.remove("selected");
          }

          let libro = e.target;
          libro.classList.add("selected");

          let id = libro.getAttribute("id");
          fetch(`get-libro.php?id=${id}`)
            .then((response) => response.text())
            .then((data) => {
              contenido.innerHTML = data;
            });
        });
      });
    });
}

function pregunta4() {
  fetch(`botones-libros.html`)
    .then((response) => response.text())
    .then((data) => {
      subMenu.innerHTML = data;
      titulo.innerHTML = "Ejercicio 4";
    });
}

function listarLibros() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `listar.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      const data = JSON.parse(ajax.responseText);
      contenido.innerHTML = "";
      contenido.innerHTML += `<div class="libros"><table border="1"></table></div>`;
      let table = document.querySelector(".libros table");
      data.forEach((libro) => {
        table.innerHTML += `<tr>
          <td>
            <img src="images/${libro.imagen}" height="100" alt="${libro.titulo}" />
          </td>
          <td>${libro.titulo}</td>
          <td>${libro.autor}</td>
          <td>${libro.editorial}</td>
          <td>${libro.anio}</td>
        </tr>`;
      });
    }
  };
  ajax.send();
}

function cargarFormulario() {
  fetch(`formulario.php`)
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
    });
}

function insertarLibro() {
  let form = document.querySelector("#formLibro");
  let data = new FormData(form);
  fetch(`insertar.php`, { method: "POST", body: data })
    .then((response) => response.json())
    .then((data) => {
      if (data.status == "success") {
        listarLibros();
      }
    });
}

function pregunta5() {
  fetch(`controles-calendario.html`)
    .then((response) => response.text())
    .then((data) => {
      subMenu.innerHTML = data;
      titulo.innerHTML = "Ejercicio 5";
    });
}

function cargarCalendario() {
  const mes = document.querySelector("#mes").value;
  const anio = document.querySelector("#anio").value;
  fetch(`calendario.php?mes=${mes}&anio=${anio}`)
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = `<div class="col">
        ${data}
      </div>`;
    });
}
