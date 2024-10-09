import logo from './logo.svg';
import './App.css';
import { useReducer, useState } from 'react';
import reducer, { ADICIONAR_FRASE, EXCLUIR_FRASE } from './reducer';

function App() {
  const [frase, setFrase] = useState('');
  const[frases, dispatchFrases] = useReducer(reducer, []);

  function salvarFrase(evento) {
    evento.preventDefault();

    dispatchFrases({
      tipo: ADICIONAR_FRASE,
      frase
    });
  }

  function excluir(fraseExcluida) {
    dispatchFrases({
      tipo: EXCLUIR_FRASE,
      frase: fraseExcluida
    });
  }

  return (
    <div className="App">
      <form onSubmit={salvarFrase}>
        <textarea
          value={frase}
          onChange={evento => setFrase(evento.target.value)}
          placeholder='Digite sua frase...'
          required
        />
        <br />
        <button>Salvar frase</button>
      </form>
      {frases.map((fraseAtual, index) => <p key={index}>{fraseAtual} - <button onClick={() => excluir(fraseAtual)}>Excluir</button></p>)}
    </div>
  );
}

export default App;
