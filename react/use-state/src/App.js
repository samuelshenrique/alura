import { useState } from 'react';
import './App.css';

function App() {

  const[endereco, setEndereco] = useState('');

  const [enderecos, setEnderecos] = useState([]);

  const manipularEndereco = (evento) => {
    const cep = evento.target.value;
    
    setEndereco({
      cep
    });

    if (cep && cep.length === 8) {
      // obter o cep
      fetch(`https://viacep.com.br/ws/${cep}/json`)
        .then(resposta => resposta.json())
        .then(dados => {

          setEnderecos(lista => [...lista, endereco]);

          setEndereco(enderecoAntigo => ({
            ...enderecoAntigo,
            bairro: dados.bairro,
            cidade: dados.localidade,
            estado: dados.uf,
            rua: dados.logradouro
          }));
        });
    }
  };

  return (
    <div className="App">
      <header className="App-header">
        <input placeholder='Digite o CEP' onChange={manipularEndereco} />
        <ul>
          <li>CEP: {endereco.cep}</li>
          <li>Rua: {endereco.rua}</li>
          <li>Bairro: {endereco.bairro}</li>
          <li>Cidade: {endereco.cidade}</li>
          <li>Estado: {endereco.estado}</li>
        </ul>
      </header>
    </div>
  );
}

export default App;
