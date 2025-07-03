import hexToRgba from 'hex-to-rgba';
import './Time.css';
import { IColaborador } from '../../compartilhado/interfaces/IColaborador.js';
import Colaborador from '../Colaborador';

interface TimeProps {
    id: string,
    corPrimaria: string,
    nome: string,
    colaboradores: IColaborador[]
    aoDeletar: (id: string) => void
    aoFavoritar: (id: string) => void,
    mudarCor: (valor: string, id: string) => void,
}

const Time = (props: TimeProps) => {
    return (
        props.colaboradores.length > 0 ?
        <section className='time' key={props.id} style={{ backgroundColor: hexToRgba(props.corPrimaria, 0.6) }}>
            <input type='color' value={props.corPrimaria} onChange={evento => props.mudarCor(evento.target.value, props.id)} className='input-cor' />

            <h3 style={{ borderBottomColor: props.corPrimaria }}>{props.nome}</h3>
            <div className='colaboradores'>
                {props.colaboradores.map(colaborador => {
                    return <Colaborador
                        corDeFundo={props.corPrimaria}
                        key={colaborador.id}
                        colaborador={colaborador}
                        aoDeletar={props.aoDeletar}
                        aoFavoritar={props.aoFavoritar}
                    />;
                })}
            </div>
        </section>
        : <></>
    );
}

export default Time;