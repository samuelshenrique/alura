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

    var pesoValido = validaPeso(peso); // true or false
    var alturaValida = validaAltura(altura); // true of false

    if (!pesoValido) {
        console.log('Peso inválido');
        pesoValido = false;
        tdImc.textContent = "Peso inválido";
        paciente.classList.add('paciente-invalido');
    }

    if (!alturaValida) {
        console.log('Altura Inválida');
        alturaValida = false;
        tdImc.textContent = "Altura inválida";
        paciente.classList.add('paciente-invalido');
    }

    if (pesoValido && alturaValida) {
        tdImc.textContent = calculaImc(peso, altura);
    }
}

var botaoAdicionar = document.querySelector("#adicionar-paciente");


function validaPeso(peso) {
    if (peso >= 0 && peso < 1000) {
        return true;
    } else {
        return false;
    }
}

function validaAltura(altura) {
    if (altura >= 0 && altura <= 3.00) {
        return true;
    } else {
        return false;
    }
}

function calculaImc(peso, altura) {
    var imc = 0;
    imc = peso / (altura * altura);

    return imc.toFixed(2);

}