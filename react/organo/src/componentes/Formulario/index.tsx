import { useState } from 'react';
import Botao from '../Botao';
import Campo from '../Campo';
import ListaSuspensa from '../ListaSuspensa';
import { v4 as uuidv4 } from 'uuid';
import './Formulario.css';
import { IColaborador } from '../../compartilhado/interfaces/IColaborador';

interface FormularioProps {
    aoColaboradorCadastrado: (colaborador: IColaborador) => void
    cadastrarTime: (time: {nome: string, cor: string}) => void,
    times: {id: string, nome: string}[],
}

const Formulario = (props: FormularioProps) => {


    const [nome, setNome] = useState('');
    const [cargo, setCargo] = useState('');
    const [imagem, setImagem] = useState('');
    const [time, setTime] = useState('');
    
    const [nomeTime, setNomeTime] = useState('');
    const [corTime, setCorTime] = useState('');

    const aoSalvar = (evento: React.FormEvent<HTMLFormElement>) => {
        evento.preventDefault();
        props.aoColaboradorCadastrado({
            id: uuidv4(),
            favorito: false,
            nome,
            cargo,
            imagem,
            time
        });
        setNome('');
        setCargo('');
        setImagem('');
        setTime('');
    }

    return (
        <section className='formulario'>
            <form onSubmit={evento => aoSalvar(evento)}>
                <h2>Preencha os dados para criar o card do colaborador.</h2>
                <Campo
                    obrigatorio={true}
                    label='Nome'
                    id='campo-nome'
                    placeholder='Informe seu nome'
                    valor={nome}
                    aoAlterado={valor => setNome(valor)}
                />
                <Campo
                    label='Cargo'
                    id='campo-cargo'
                    placeholder='Informe seu cargo'
                    obrigatorio={true}
                    valor={cargo}
                    aoAlterado={valor => setCargo(valor)}
                />
                <Campo
                    label='Imagem'
                    id='campo-imagem'
                    placeholder='Informe o endereço da imagem'
                    valor={imagem}
                    aoAlterado={valor => setImagem(valor)}
                />
                <ListaSuspensa
                    obrigatorio={true}
                    label='Time'
                    id='campo-time'
                    itens={props.times}
                    valor={time}
                    aoAlterado={valor => setTime(valor)}
                />
                <Botao>
                    Criar card
                </Botao>
            </form>
            <form onSubmit={(evento) => {
                evento.preventDefault();
                props.cadastrarTime({nome: nomeTime, cor: corTime});
                setNomeTime('');
                setCorTime('');
            }}>
                <h2>Preencha os dados para criar um novo time</h2>
                <Campo
                    obrigatorio
                    label='Nome'
                    id='campo-nome-time'
                    placeholder='Informe o nome do time'
                    valor={nomeTime}
                    aoAlterado={valor => setNomeTime(valor)}
                />
                <Campo
                    type='color'
                    label='Cor'
                    id='campo-cor-time'
                    placeholder='Informe a cor do time'
                    obrigatorio
                    valor={corTime}
                    aoAlterado={valor => setCorTime(valor)}
                />
                <Botao>
                    Criar um novo time
                </Botao>
            </form>
        </section>
    );
}

export default Formulario;