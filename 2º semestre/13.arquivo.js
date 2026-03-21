function somar(a, b) { return a + b; }
function subtrair(a, b) { return a - b; } // corrigido nome
function multiplicar(a, b) { return a * b; }

function dividir(a, b) {
  if (b === 0) {
    alert("Divisão por zero não é possível.");
    return null;
  }
  return a / b;
}

function exponencial(a, b) {
  return Math.pow(a, b); // ou: return a ** b;
}