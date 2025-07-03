import './Campo.css';

interface CampoProps {
    type?: string
    id: string
    valor: string
    obrigatorio?: boolean
    placeholder: string
    aoAlterado: (valor: string) => void
    label: string
}

const Campo = ({type = 'text', id, valor, obrigatorio = false, placeholder, aoAlterado, label}: CampoProps) => {
    const placeholderModificada = `${placeholder}...`;

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
                onChange={evento => aoAlterado(evento.target.value)}
                placeholder={placeholderModificada}
                required={obrigatorio}
            />
        </div>
    );
}

export default Campo;