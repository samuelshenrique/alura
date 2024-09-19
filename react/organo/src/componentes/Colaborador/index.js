import { IoCloseCircle } from 'react-icons/io5';
import { AiOutlineHeart, AiFillHeart } from "react-icons/ai";
import './Colaborador.css';

const Colaborador = ({id, nome, imagem, cargo, corDeFundo, favorito, aoFavoritar, aoDeletar}) => {
    const favoritar = () => {
        aoFavoritar(id);
    };

    const propsFavorito = {
        size: 25,
        onClick: favoritar
    };

    return(
        <div className='colaborador' key={id}>
            <IoCloseCircle size={25} className='deletar' onClick={evento => aoDeletar(id)} />
            <div className='cabecalho' style={{backgroundColor: corDeFundo}}>
                <img src={imagem} alt={nome} />
            </div>
            <div className='rodape'>
                <h4>{nome}</h4>
                <h5>{cargo}</h5>
                <div className='favoritar'>
                    {favorito
                        ? <AiFillHeart {...propsFavorito} color='#ff0000' />
                        : <AiOutlineHeart {...propsFavorito} />
                    }
                </div>
            </div>
        </div>
    );
};

export default Colaborador;