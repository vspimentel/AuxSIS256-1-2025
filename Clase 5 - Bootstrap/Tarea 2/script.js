function ejercicio1() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `cambiaratributos.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      contenido.innerHTML = ajax.responseText;
      apply.addEventListener("click", applyStyles);
    }
  };
  ajax.send();
}

function applyStyles() {
  const widthValue = width.value;
  const heightValue = height.value;
  const colorValue = color.value;
  const selectedElement = element.value;

  const section = document.getElementById(selectedElement);

  section.style.width = `${widthValue}px`;
  section.style.height = `${heightValue}px`;
  section.style.backgroundColor = colorValue;
}

function ejercicio2() {
  fetch("tabla.html")
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
      tabla.addEventListener("click", async () => {
        const results = await getCalc();
        generateTable(results);
      });
    });
}

async function getCalc() {
  let form = document.querySelector("form");
  var data = new FormData(form);
  const response = await fetch("calcular.php", { method: "POST", body: data });
  const result = await response.json();
  return result;
}

function generateTable(results) {
  results.forEach((element) => {
    resultsTable.innerHTML += `<tr>
          <td>${element["num1"]}</td>
          <td>${element["symbol"]}</td>
          <td>${element["num2"]}</td>
          <td>${element["equal"]}</td>
          <td>${element["result"]}</td>
      </tr>`;
  });
  resultsTable.style.display = "block";
}

function ejercicio3() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `seleccionar.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      contenido.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}

function getCalendar() {
  const mesValue = mes.value;
  const anioValue = anio.value;
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `calendario.php?mes=${mesValue}&anio=${anioValue}`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      result.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}

function ejercicio4() {
  fetch("Tarea 2/searchbar.html")
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
      console.log(searchbar);
      searchbar.addEventListener("input", search);
    });
}

async function search() {
  const searchValue = searchbar.value;
  const response = await fetch(`Tarea 2/search.php?prompt=${searchValue}`);
  const results = await response.json();
  console.log(results);
  let resultsDiv = document.querySelector(".results");
  resultsDiv.innerHTML = "";
  results.forEach((result) => {
    resultsDiv.innerHTML += `<div class="result">
          ${result}
      </div>`;
  });
  resultsDiv.style.display = "block";
}
