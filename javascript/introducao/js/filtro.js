var campoFiltro = document.getElementById("filtrar-tabela");

campoFiltro.addEventListener("input", function () {
    var pacientes = document.querySelectorAll(".paciente");

    if (this.value.length > 0) {
        for (i = 0; i < pacientes.length; i++) {
            var paciente = pacientes[i];
            var nome = paciente.querySelector(".info-nome").textContent;
            var expressao = new RegExp(this.value, "i");

            if (expressao.test(nome)) {
                paciente.classList.remove('invisivel');
            } else {
                paciente.classList.add('invisivel');
            }
        }
    } else {
        for (i = 0; i < pacientes.length; i++) {
            var paciente = pacientes[i];
            paciente.classList.remove('invisivel');
        }
    }
});