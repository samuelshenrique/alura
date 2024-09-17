import { useState } from 'react';
import './CampoTexto.css';

const CampoTexto = (props) => {
    const placeholderModificada = `${props.placeholder}...`;

    const aoDigitado = (evento) => {
        props.aoAlterado(evento.target.value);
    }

    return (
        <div className="campo-texto">
            <label htmlFor={props.id}>
                {props.label}
            </label>
            <input id={props.id} name={props.id} value={props.valor} onChange={aoDigitado} placeholder={placeholderModificada} required={props.obrigatorio} />
        </div>
    );
}

export default CampoTexto;