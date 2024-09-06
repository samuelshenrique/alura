import React, { Component } from "react";
import "./estilo.css";

export class FormularioCadastro extends Component {
    titulo;

    constructor(props) {
        super(props);
        this.titulo = "";
        this.texto = "";
    }
    _handleMudancaTitulo(evento) {
        evento.stopPropagation();
        this.titulo = evento.target.value;
    }

    _handleMudancaTexto(evento) {
        evento.stopPropagation();
        this.texto = evento.target.value;
    }

    _criarNota(evento) {
        evento.preventDefault();
        evento.stopPropagation();
        this.props.criarNota(this.titulo, this.texto);
    }

    render() {
        return (
            <form className="form-cadastro" onSubmit={this._criarNota.bind(this)}>
                <input type="text"
                    placeholder="Título"
                    className="form-cadastro_input"
                    onChange={this._handleMudancaTitulo.bind(this)}
                />
                <textarea placeholder="Escreva sua nota..." className="form-cadastro_input" rows={15} onChange={this._handleMudancaTexto.bind(this)}></textarea>
                <button className="form-cadastro_input form-cadastro_submit">Criar nota</button>
            </form>
        );
    }
}