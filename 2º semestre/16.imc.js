// Cálculo do IMC
const imc = (peso, altura) => peso / (altura * altura);

// Classificação do IMC
const situacao = (valor_imc) => {
  if (valor_imc < 18.5) return "Abaixo do peso";
  if (valor_imc < 25)   return "Peso ideal";
  if (valor_imc < 30)   return "Levemente acima do peso";
  if (valor_imc < 35)   return "Obesidade grau I";
  if (valor_imc < 40)   return "Obesidade grau II (severa)";
  return "Obesidade grau III (mórbida)";
};
// Resultado do IMC
const executar = () =>{
    const peso = eval(document.getElementById("v1").value);
    const altura = eval(document.getElementById("v2").value);
    if (!isFinite(peso) || !isFinite(altura) || peso <= 0 || altura <= 0) {
        document.getElementById("resultado").textContent = `Digite um valor válido`; 
    } else {
        const v_imc = imc(peso,altura);
        const v_sit = situacao(v_imc);
        document.getElementById("resultado").textContent = `O resultado é: ${v_sit}`;
    }
}