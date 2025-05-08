let paises = document.querySelector("#paises");
let ciudades = document.querySelector("#ciudades");

function cargarPaises() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `paises.php?tipo=json`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      const data = JSON.parse(ajax.responseText);
      paises.innerHTML = "";
      data.forEach((pais) => {
        paises.innerHTML += `<option value="${pais.id}">${pais.nombre}</option>`;
      });
      cargarCiudades(paises.value);
    }
  };
  ajax.send();
}

cargarPaises();

async function cargarCiudades(pais) {
  const response = await fetch("ciudades.php?tipo=json&pais=" + pais);
  const data = await response.json();
  ciudades.innerHTML = "";
  data.forEach((ciudad) => {
    ciudades.innerHTML += `<option value="${ciudad.id}">${ciudad.nombre}</option>`;
  });
}

paises.addEventListener("change", function (e) {
  cargarCiudades(e.target.value);
});
