import styled from "styled-components";

const FigureStyled = styled.figure`
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.15);
    line-height: 0.5;
    margin: 0;
    padding: 0;
    width: ${(props) => (props.$expandida ? '100%' : '460px')};
`

const ImgStyled = styled.img`
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    width: 100%;
`

const FigcaptionStyled = styled.figcaption`
    background: #001634;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    color: white;
    padding: 15px;
`

const FooterStyled = styled.footer`
    display: flex;
    justify-content: space-between;
    align-items: center;

    & div {
        display: flex;
        gap: 10px;
    }
`
const BotaoIcone = styled.button`
    background: transparent;
    border: none;
    
    & img {
        cursor: pointer;
        width: 18px;
    }
`


const Imagem = ({ foto, expandida = false, aoZoomSolicitado, aoAlternarFavorito }) => {
    return (
        <FigureStyled $expandida={expandida}>
            <ImgStyled src={foto.path} />
            {(foto.titulo && foto.fonte) && <FigcaptionStyled>
                {foto.titulo && <h3>{foto.titulo}</h3>}
                <FooterStyled>
                    <p>{foto.fonte}</p>
                    <div>
                        <BotaoIcone onClick={() => aoAlternarFavorito(foto)}>
                            <img src={foto.favorito ? '/icones/favorito-ativo.png' : '/icones/favorito.png'} alt='icone para favoritar' />
                        </BotaoIcone>
                        {!expandida &&
                            <BotaoIcone onClick={() => aoZoomSolicitado(foto)}>
                                <img src='/icones/expandir.png' alt='icone para expandir' />
                            </BotaoIcone>
                        }
                    </div>
                </FooterStyled>
            </FigcaptionStyled>}
        </FigureStyled>
    )
}

export default Imagem;