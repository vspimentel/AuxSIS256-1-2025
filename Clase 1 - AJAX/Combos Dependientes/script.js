let paises = document.querySelector("#paises");

function cargarPaises() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `paises.php?tipo=html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      paises.innerHTML = ajax.responseText;
      cargarCiudades(paises.value);
    }
  };
  ajax.send();
}

cargarPaises();

function cargarCiudades(pais) {
  let ciudades = document.querySelector("#ciudades");
  fetch("ciudades.php?tipo=html&pais=" + pais)
    .then((response) => response.text())
    .then((data) => {
      ciudades.innerHTML = data;
    });
}

paises.addEventListener("change", function (e) {
  cargarCiudades(e.target.value);
});
