import './ListaSuspensa.css';

const ListaSuspensa = (props) => {
    return (
        <div className='lista-suspensa'>
            <label htmlFor={props.id}>{ props.label }</label>
            <select required={props.obrigatorio} id={props.id} name={props.id} value={props.valor} onChange={evento => props.aoAlterado(evento.target.value)}>
                <option value='' disabled></option>
                {props.itens.map(item => <option key={item}>{item}</option>)}
            </select>
        </div>
    );
};

export default ListaSuspensa;