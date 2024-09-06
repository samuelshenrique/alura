import React, { Component } from "react";
import "./estilo.css"

export class CardNota extends Component {
    render() {
        return (
            <section className="card-nota">
                <header className="card-nota_cabecalho">
                    <h3>{this.props.titulo}</h3>
                </header>
                <p className="card-nota_texto">{this.props.texto}</p>
            </section>
        );
    }
}