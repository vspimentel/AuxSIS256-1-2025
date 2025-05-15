let modal = document.querySelector(".modal");
let overlay = document.querySelector(".overlay");
let botonCerrar = document.querySelector(".cerrar");

function cargarPagina() {
  //   const nombreValue = prompt("Introduce tu nombre");
  //   const cuValue = prompt("Introduce tu CU");
  //   nombre.innerHTML = nombreValue;
  //   cu.innerHTML = cuValue;
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `botones.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      menu.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}

cargarPagina();

function cargarGaleria() {
  fetch(`galeria.php`)
    .then((response) => response.text())
    .then((data) => {
      principal.innerHTML = data;
      let botones = galeria.querySelectorAll(".boton");
      botones.forEach((boton) => {
        boton.addEventListener("click", function (e) {
          const ruta = e.target.src;
          let imagen = modal.querySelector("img");
          imagen.src = ruta;
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
  ajax.open("GET", `formulario.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      principal.innerHTML = ajax.responseText;
      cargarCarreras();
    }
  };
  ajax.send();
}

function cargarCarreras() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `carreras.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      const data = JSON.parse(ajax.responseText);
      let select = document.querySelector("[name=carrera]");
      data.carreras.forEach((carrera) => {
        select.innerHTML += `<option value="${carrera.id}">${carrera.carrera}</option>`;
      });
    }
  };
  ajax.send();
}

function guardarLibro() {
  let form = document.querySelector("#formularioLibro");
  let data = new FormData(form);
  var ajax = new XMLHttpRequest();
  ajax.open("POST", `guardar.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      alert("El libro se guardó correctamente");
    }
  };
  ajax.send(data);
}
