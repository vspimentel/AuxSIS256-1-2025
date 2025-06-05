let pantallaInferior = document.querySelector(".inferior");
let pantallaSuperior = document.querySelector(".superior");

let valor1 = undefined;
let valor2 = undefined;
let operacion = undefined;

let teclasNumeros = document.querySelectorAll(".numero");

teclasNumeros.forEach((tecla) => {
  tecla.addEventListener("click", () => {
    pantallaInferior.innerHTML += tecla.innerHTML;
  });
});

let teclasOperaciones = document.querySelectorAll(".operacion");

teclasOperaciones.forEach((tecla) => {
  tecla.addEventListener("click", () => {
    pantallaSuperior.innerHTML = pantallaInferior.innerHTML;
    pantallaInferior.innerHTML = "";
    valor1 = parseFloat(pantallaSuperior.innerHTML);

    operacion = tecla.innerHTML;
  });
});

let teclaIgual = document.querySelector("#igual");
teclaIgual.addEventListener("click", () => {
  valor2 = parseFloat(pantallaInferior.innerHTML);
  pantallaSuperior.innerHTML = `${valor1} ${operacion} ${valor2}`;
  resultado = undefined;
  switch (operacion) {
    case "+":
      resultado = valor1 + valor2;
      break;
    case "-":
      resultado = valor1 - valor2;
      break;
    case "*":
      resultado = valor1 * valor2;
      break;
    case "/":
      resultado = valor1 / valor2;
      break;
    default:
      break;
  }
  pantallaInferior.innerHTML = resultado;
  valor1 = resultado;
});

let allClearButton = document.querySelector("#all-clear");
let deleteButton = document.querySelector("#delete");

allClearButton.addEventListener("click", () => {
  valor1 = undefined;
  valor2 = undefined;
  operacion = undefined;
  pantallaInferior.innerHTML = "";
  pantallaSuperior.innerHTML = "";
});

deleteButton.addEventListener("click", () => {
  pantallaInferior.innerHTML = pantallaInferior.innerHTML.slice(0, -1);
});
