var tabela = document.querySelector("tbody#tabela-pacientes");

tabela.addEventListener("dblclick", function(event) {
    event.target.parentNode.classList.add('fadeOut');
    
    setTimeout(function () {
        event.target.parentNode.remove();
    }, 500);
});



// var pacientes = document.querySelectorAll(".paciente");

// pacientes.forEach(function(paciente) {
//     paciente.addEventListener("dblclick", function() {
//         this.remove();
//     });
// });