import { useState } from 'react';
import Banner from './componentes/Banner';
import Formulario from './componentes/Formulario';
import Time from './componentes/Time';
import Rodape from './componentes/Rodape';
import { v4 as uuidv4 } from 'uuid';

function App() {
  const [times, setTime] = useState([
    {
      id: uuidv4(),
      nome: 'Programação',
      cor: '#57C278',
    },
    {
      id: uuidv4(),
      nome: 'Front-end',
      cor: '#82CFFA',

    },
    {
      id: uuidv4(),
      nome: 'Data Science',
      cor: '#A6D157',
    },
    {
      id: uuidv4(),
      nome: 'DevOps',
      cor: '#E06B69',
    },
    {
      id: uuidv4(),
      nome: 'UX e Design',
      cor: '#DB6EBF',
    },
    {
      id: uuidv4(),
      nome: 'Mobile',
      cor: '#FFBA05',
    },
    {
      id: uuidv4(),
      nome: 'Inovação e Gestão',
      cor: '#FF8A29',
    },
  ]);

  const [colaboradores, setColaborador] = useState([]);

  const aoNovoColaboradorAdicionado = (colaborador) => {
    setColaborador([...colaboradores, colaborador]);
  };

  const deletarColaborador = (id) => {
    setColaborador(colaboradores.filter(colaborador => colaborador.id !== id));
  };

  const mudarCorDoTime = (cor, id) => {
    setTime(times.map(time => {
      if (time.id === id) {
        time.cor = cor
      }
      return time;
    }));
  }
  
  const cadastrarTime = (novoTime) => {
    setTime([...times, {...novoTime, id:uuidv4()}]);
  }

  const resolverFavorito = (id) => {
    setColaborador(colaboradores.map(colaborador => {
      if (colaborador.id === id) {
        colaborador.favorito = !colaborador.favorito;
      }
      return colaborador;
    }));
  }

  return (
    <div className="App">
      <Banner />
      <Formulario
        aoColaboradorCadastrado={colaborador => aoNovoColaboradorAdicionado(colaborador)}
        times={times}
        cadastrarTime={cadastrarTime}
      />
      {times.map(
        (time) =>
        <Time
          key={time.id}
          id={time.id}
          nome={time.nome}
          corPrimaria={time.cor}
          corSecundaria={time.corSecundaria}
          colaboradores={colaboradores.filter(colaborador => colaborador.time === time.nome)}
          aoDeletar={deletarColaborador}
          mudarCor={mudarCorDoTime}
          aoFavoritar={resolverFavorito}
        />
      )}
      <Rodape />
    </div>
  );
}

export default App;
