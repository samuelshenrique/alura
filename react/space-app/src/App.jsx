import styled from "styled-components";
import EstilosGlobais from "./componentes/EstilosGlobais";
import Cabecalho from "./componentes/Cabecalho";
import BarraLateral from "./componentes/BarraLateral";
import SecaoPrincipal from "./componentes/SecaoPrincipal";
import Banner from "./componentes/Banner";
import CorpoDaPagina from "./componentes/CorpoDaPagina";
import imagemBanner from './assets/banner.png';
import Galeria from "./componentes/Galeria";
import fotos from './fotos.json';
import { useState } from "react";
import ModalZoom from "./componentes/ModalZoom";

const FundoGradiente = styled.div`
  background: linear-gradient(174.61deg, #041833 0%, #04244F 47%, #154580 100%);
  width: 100%;
`

const AppContainer = styled.div`
  margin: 0 auto;
  max-width: 100%;
  width: 1440px;
`

const App = () => {
  const [fotosDaGaleria, setFotosDaGaleria] = useState(fotos);
  const [fotoSelecionada, setFotoSelecionada] = useState(null);

  const aoAlternarFavorito = (foto) => {
    if (foto.id === fotoSelecionada?.id) {
      setFotoSelecionada({
        ...fotoSelecionada,
        favorito: !fotoSelecionada.favorito
      });
    }


    setFotosDaGaleria(fotosDaGaleria.map((fotoGaleria) => {
      return {
        ...fotoGaleria,
        favorito: fotoGaleria.id === foto.id ? !fotoGaleria.favorito : fotoGaleria.favorito
      };
    }));
  }

  return (
    <FundoGradiente>
      <EstilosGlobais />
      <AppContainer>
        <Cabecalho />
        <CorpoDaPagina>
          <BarraLateral />
          <SecaoPrincipal>
            <Banner
              texto='A galeria mais completa de fotos do espaço!'
              backgroundImage={imagemBanner}
            />
            <Galeria
              aoFotoSelecionada={foto => setFotoSelecionada(foto)}
              fotos={fotosDaGaleria}
              aoAlternarFavorito={aoAlternarFavorito}
            />
          </SecaoPrincipal>
        </CorpoDaPagina>
      </AppContainer>
      <ModalZoom foto={fotoSelecionada} fecharModal={setFotoSelecionada} aoAlternarFavorito={aoAlternarFavorito} />
    </FundoGradiente>
  )
}

export default App;
