console.log(`\nTrabalhando com Loops`);

const listaDeDestinos = new Array(
    'Salvador',
    'São Paulo',
    'Rio de Janeiro',
);

const idadeComprador = 18;
const estaAcompanhada = false;
let temPassagemComprada = false;
const destino = "São Paulo";

console.log("Destinos Possíveis:");
console.log(listaDeDestinos);

const podeComprar = idadeComprador >= 18 && temPassagemComprada;

let contador = 0;
let destinoExiste = false;
while (contador < 3) {
    if (listaDeDestinos[contador] == destino) {
        // console.log("Destino Existe");
        destinoExiste = true;
        break;
    }

    contador++;
}

console.log("Destino existe: ", destinoExiste);

for (let cont = 0; cont < 3; cont++) {
    if (listaDeDestinos[contador] == destino) {
        // console.log("Destino Existe");
        destinoExiste = true;
        break;
    }
}

console.log("Destino existe: ", destinoExiste);