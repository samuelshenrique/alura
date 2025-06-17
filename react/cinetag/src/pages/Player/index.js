import Banner from 'componentes/Banner';
import styles from './Player.module.css';
import Titulo from 'componentes/Titulo';
import { useParams } from 'react-router-dom';
import NaoEncontrada from 'pages/NaoEncontrada';
import { useEffect, useState } from 'react';

function Player() {
    const [video, setVideo] = useState(null);
    const parametros = useParams();

    useEffect(() => {
        fetch(`https://my-json-server.typicode.com/monicahillman/cinetag-api/videos?id=${parametros.id}`)
            .then((resposta) => resposta.json())
            .then(dados => {
                setVideo(...dados)
            })
    }, []);

    if (!video && video !== null) {
        return <NaoEncontrada />
    }
    return (
        <>
            {
                video !== null ?
                    <>
                        <Banner imagem="player" />
                        <Titulo>
                            <h1>Player</h1>
                        </Titulo>
                        <section className={styles.container}>
                            <iframe
                                width="100%"
                                height="100%"
                                src={video.link}
                                title={video.titulo}
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen
                            ></iframe>
                        </section>
                    </>
                : 'loading'
            }
        </>
    );
}

export default Player;