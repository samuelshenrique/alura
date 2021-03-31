var titulo = document.querySelector(".titulo");
titulo.textContent = "Aparecida Nutricionista";

var pacientes = document.querySelectorAll(".paciente");

for (var i = 0; i < pacientes.length; i++) {
    var paciente = pacientes[i];

    var tdPeso = paciente.querySelector(".info-peso");
    var peso = tdPeso.textContent;

    var tdAltura = paciente.querySelector(".info-altura");
    var altura = tdAltura.textContent;

    var tdImc = paciente.querySelector(".info-imc");

    var pesoValido = true;
    var alturaValida = true;

    if (peso <= 0 || peso >= 1000) {
        console.log('Peso inválido');
        pesoValido = false;
        tdImc.textContent = "Peso inválido";
        paciente.classList.add('paciente-invalido');
    }
    
    if (altura <= 0 || altura >= 3.00) {
        console.log('Altura Inválida');
        alturaValida = false;
        tdImc.textContent = "Altura inválida";
        paciente.classList.add('paciente-invalido');
    }

    if (pesoValido && alturaValida) {
        var imc = peso / (altura * altura);
        tdImc.textContent = imc.toFixed(2);
    }
}

var botaoAdicionar = document.querySelector("#adicionar-paciente");

botaoAdicionar.addEventListener("click", function (event) {
    event.preventDefault();

    var form = document.querySelector("#form-adiciona");

    // Pega valores do form
    var nome = form.nome.value;
    var peso = form.peso.value;
    var altura = form.altura.value;
    var gordura = form.gordura.value;

    // Cria elemento <tr>
    var pacienteTr = document.createElement("tr");

    // Cria elemtnos <td> de conteúdo
    var nomeTd = document.createElement("td");
    var pesoTd = document.createElement("td");
    var alturaTd = document.createElement("td");
    var gorduraTd = document.createElement("td");
    var imcTd = document.createElement("td");

    // Define textContent para elementos
    nomeTd.textContent = nome;
    pesoTd.textContent = peso;
    alturaTd.textContent = altura;
    gorduraTd.textContent = gordura;

    // Colocando elementos <td> como filho do elemento <tr>
    pacienteTr.appendChild(nomeTd);
    pacienteTr.appendChild(pesoTd);
    pacienteTr.appendChild(alturaTd);
    pacienteTr.appendChild(gorduraTd);

    // Colocando o <tr> com dados como filho da tabela para aparecer ao usuário
    var tabela = document.querySelector("#tabela-pacientes");
    tabela.appendChild(pacienteTr);
});