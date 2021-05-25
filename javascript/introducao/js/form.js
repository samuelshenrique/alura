botaoAdicionar.addEventListener("click", function (event) {
    event.preventDefault();

    var form = document.querySelector("#form-adiciona");
    var paciente = getPacienteFormulario(form);

    var errors = validaPaciente(paciente);
    if (errors.length > 0) {
        exibeMensagemDeErro(errors);
        return;
    }

    adicionaPacienteNaTabela(paciente);

    form.reset();
    document.getElementById("mensagens-erro").innerHTML = '';
});

function adicionaPacienteNaTabela(paciente) {
    var pacienteTr = montaTr(paciente);

    // Colocando o <tr> com dados como filho da tabela para aparecer ao usuário
    var tabela = document.querySelector("#tabela-pacientes");
    tabela.appendChild(pacienteTr);
}

function getPacienteFormulario(form) {
    // Cria objeto do formulário com dados do paciente
    var paciente = {
        nome: form.nome.value,
        peso: form.peso.value,
        altura: form.altura.value,
        gordura: form.gordura.value,
        imc: calculaImc(form.peso.value, form.altura.value)
    };

    return paciente;
}

function montaTr(paciente) {
    // Cria elemento <tr>
    var pacienteTr = document.createElement("tr");
    pacienteTr.classList.add("paciente");

    // Colocando elementos <td> como filho do elemento <tr>
    pacienteTr.appendChild(montaTd(paciente.nome, "info-nome"));
    pacienteTr.appendChild(montaTd(paciente.peso, "info-peso"));
    pacienteTr.appendChild(montaTd(paciente.altura, "info-altura"));
    pacienteTr.appendChild(montaTd(paciente.gordura, "info-gordura"));
    pacienteTr.appendChild(montaTd(paciente.imc, "info-imc"));

    return pacienteTr;
}

function montaTd(dado, classe) {
    var td = document.createElement("td");
    td.classList.add(classe);
    td.textContent = dado;

    return td;
}


function validaPaciente(paciente) {
    let errors = [];

    if (!validaPeso(paciente.peso)) {
        errors.push('Peso é inválido');
    }

    if (!validaAltura(paciente.altura)) {
        errors.push('Altura é inválida');
    }

    if (paciente.nome.length == 0) {
        errors.push('O nome não pode ser em branco');
    }

    if (paciente.gordura.length == 0) {
        errors.push('A gordura não pode ser em branco');
    }

    if (paciente.peso.length == 0) {
        errors.push('O peso não pode ser em branco');
    }

    if (paciente.altura.length == 0) {
        errors.push('A altura não pode ser em branco');
    }
    return errors;
}

function exibeMensagemDeErro(errors) {
    let ul = document.querySelector("#mensagens-erro");

    ul.innerHTML = '';

    errors.forEach(function(erro) {
        var li = document.createElement("li");
        li.textContent = erro;

        ul.appendChild(li);
    });
}