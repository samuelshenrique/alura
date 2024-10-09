import styled from "styled-components";

const SecaoPrincipalEstilizada = styled.section`
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    gap: 24px;
    width: 100%;
`

const SecaoPrincipal = ({ children }) => {
    return (
        <SecaoPrincipalEstilizada>
            {children}
        </SecaoPrincipalEstilizada>
    );
}

export default SecaoPrincipal;