import './Campo.css';

const Campo = ({type = 'text', id, valor, obrigatorio, placeholder, aoAlterado, label}) => {
    const placeholderModificada = `${placeholder}...`;

    const aoDigitado = (evento) => {
        aoAlterado(evento.target.value);
    }

    return (
        <div className={`campo campo-${type}`}>
            <label htmlFor={id}>
                {label}
            </label>
            <input
                type={type}
                id={id}
                name={id}
                value={valor}
                onChange={aoDigitado}
                placeholder={placeholderModificada}
                required={obrigatorio}
            />
        </div>
    );
}

export default Campo;