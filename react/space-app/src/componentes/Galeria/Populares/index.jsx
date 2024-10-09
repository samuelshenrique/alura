import styled from "styled-components";
import Titulo from "../../Titulo";
import Imagem from "../Imagem";
import fotos from './fotos-populares.json';

const Fotos = styled.div`
    display: flex;
    flex-direction: row;
    gap: 30px;
    flex-wrap: wrap;

    figure {
        max-width: 220px;
    }
`

const Populares = () => {
    return (
        <section>
            <Titulo $alinhamento='center'>Populares</Titulo>
            <Fotos>
                {fotos.map((foto) => <Imagem key={foto.id} foto={foto} />)}
            </Fotos>
        </section>
    )
}

export default Populares;