import hexToRgba from 'hex-to-rgba';
import Colaborador from '../Colaborador';
import './Time.css';

const Time = (props) => {
    return (
        props.colaboradores.length > 0 &&
        <section className='time' key={props.id} style={{ backgroundColor: hexToRgba(props.corPrimaria, 0.6) }}>
            <input type='color' value={props.corPrimaria} onChange={evento => props.mudarCor(evento.target.value, props.id)} className='input-cor' />

            <h3 style={{ borderBottomColor: props.corPrimaria }}>{props.nome}</h3>
            <div className='colaboradores'>
                {props.colaboradores.map(colaborador => {
                    return <Colaborador
                        corDeFundo={props.corPrimaria}
                        key={colaborador.id}
                        id={colaborador.id}
                        nome={colaborador.nome}
                        cargo={colaborador.cargo}
                        favorito={colaborador.favorito}
                        imagem={colaborador.imagem}
                        aoDeletar={props.aoDeletar}
                        aoFavoritar={props.aoFavoritar}
                    />;
                })}
            </div>
        </section>
    );
}

export default Time;