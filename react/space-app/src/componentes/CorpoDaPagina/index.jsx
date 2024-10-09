import styled from "styled-components";

const CorpoDaPaginaEstilizado = styled.div`
    display: flex;
    gap: 25px;
`

const CorpoDaPagina = ({ children }) => {
    return (
        <CorpoDaPaginaEstilizado>
            {children}
        </CorpoDaPaginaEstilizado>
    );
}

export default CorpoDaPagina;