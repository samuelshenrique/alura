import styled from "styled-components";
import lupa from './search.png';

const ContainerEstilizado = styled.div`
    position: relative;
`

const Lupa = styled.img`
    position: absolute;
    right: 30px;
    top: 30px;
`

const CampoTextoEstilizado = styled.input`
    background: transparent;
    border-radius: 10px;
    border: 2px solid #C98CF1;
    color: white;
    font-weight: 400;
    font-size: 20px;
    padding: 16px;
    margin: 18px;
    width: 560px;


    &::placeholder {
        color: white;
    }
`

const CampoTexto = () => {
    return (
        <ContainerEstilizado>
            <CampoTextoEstilizado placeholder='O que você procura?' />
            <Lupa src={lupa} alt='Botão de pesquisa' />
        </ContainerEstilizado>
    )
}

export default CampoTexto;