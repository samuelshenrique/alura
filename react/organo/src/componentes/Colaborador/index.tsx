import { IoCloseCircle } from 'react-icons/io5';
import { AiOutlineHeart, AiFillHeart } from "react-icons/ai";
import './Colaborador.css';
import { IColaborador } from '../../compartilhado/interfaces/IColaborador';

interface ColaboradorProps {
    colaborador: IColaborador,
    corDeFundo: string,
    aoFavoritar: (id: string) => void,
    aoDeletar: (id: string) => void
}

const Colaborador = ({colaborador, corDeFundo, aoFavoritar, aoDeletar}: ColaboradorProps) => {
    const favoritar = () => {
        aoFavoritar(colaborador.id);
    };

    const propsFavorito = {
        size: 25,
        onClick: favoritar
    };

    return(
        <div className='colaborador' key={colaborador.id}>
            <IoCloseCircle size={25} className='deletar' onClick={() => aoDeletar(colaborador.id)} />
            <div className='cabecalho' style={{backgroundColor: corDeFundo}}>
                <img src={colaborador.imagem} alt={colaborador.nome} />
            </div>
            <div className='rodape'>
                <h4>{colaborador.nome}</h4>
                <h5>{colaborador.cargo}</h5>
                <div className='favoritar'>
                    {colaborador.favorito
                        ? <AiFillHeart {...propsFavorito} color='#ff0000' />
                        : <AiOutlineHeart {...propsFavorito} />
                    }
                </div>
            </div>
        </div>
    );
};

export default Colaborador;