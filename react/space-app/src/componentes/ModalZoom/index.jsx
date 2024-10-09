import styled from "styled-components";
import Imagem from "../Galeria/Imagem";

const Overlay = styled.div`
    background-color: rgba(0, 0, 0, 0.7);
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
`

const DialogEstilizado = styled.dialog`
    border: 0;
    position: fixed;
    top: 10%;
    width: 35%;
    padding: 0;
    background: transparent;

    & form > button {
        background: transparent;
        border: 0;
        cursor: pointer;
        color: white;
        font-family: 'GandhiSansBold';
        font-size: 22px;
        padding: 5px;
        position: absolute;
        top: 10px;
        right: 10px;
    }
`

const ModalZoom = ({ foto, fecharModal, aoAlternarFavorito }) => {
    return (
        <>
            {foto && <>
                <Overlay />
                <DialogEstilizado open={!!foto}>
                    <Imagem
                        foto={foto}
                        expandida={true}
                        aoAlternarFavorito={aoAlternarFavorito}
                    />
                    <form method="dialog">
                        <button onClick={() => fecharModal('')}>x</button>
                    </form>
                </DialogEstilizado>
            </>
            }
        </>
    )
}

export default ModalZoom;