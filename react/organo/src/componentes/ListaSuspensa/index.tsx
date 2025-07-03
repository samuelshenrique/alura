import './ListaSuspensa.css';

interface ListaSuspensaProps {
    id: string,
    label: string,
    valor: string,
    itens: {id: string, nome: string}[],
    aoAlterado: (valor: string) => void,
    obrigatorio: boolean
}

const ListaSuspensa = ({id, label, valor, obrigatorio, aoAlterado, itens}: ListaSuspensaProps) => {
    return (
        <div className='lista-suspensa'>
            <label htmlFor={id}>{ label }</label>
            <select required={obrigatorio} id={id} name={id} value={valor} onChange={evento => aoAlterado(evento.target.value)}>
                <option value='' disabled></option>
                {itens.map(item => <option key={item.id}>{item.nome}</option>)}
            </select>
        </div>
    );
};

export default ListaSuspensa;