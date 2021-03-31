console.log(`Trabalhando com Condicionais`);

const listaDeDestinos = new Array(
    'Salvador',
    'São Paulo',
    'Rio de Janeiro',
);

const idadeComprador = 15;
const estaAcompanhada = true;
const temPassagemComprada = true;

console.log("Destinos Possíveis:");
console.log(listaDeDestinos);

if (idadeComprador >= 18 || estaAcompanhada) {
    console.log("Comprador pode comprar");
    listaDeDestinos.splice(1, 1);
} else {
    console.log("Não é permitido vender passagem para o comprador");
}

console.log("Embarque: \n\n");
if (idadeComprador > 18 && temPassagemComprada) {
    console.log("Boa viagem");
} else {
    console.log("Não pode embarcar")
}

console.log(listaDeDestinos);

// console.log(idadeComprador > 18);
// console.log(idadeComprador < 18);
// console.log(idadeComprador <= 18);
// console.log(idadeComprador >= 18);
// console.log(idadeComprador == 18);