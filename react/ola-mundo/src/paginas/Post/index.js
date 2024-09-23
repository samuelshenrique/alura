import './Post.css';

import { useParams } from 'react-router-dom';
import posts from 'json/posts.json';
import PostModelo from 'componentes/PostModelo';
import ReactMarkdown from 'react-markdown'
import NaoEncontrada from 'paginas/NaoEncontrada';
import PaginaPadrao from 'componentes/PaginaPadrao';
import PostsRecomendados from 'componentes/PostsRecomendados';

export default function Post() {
    const parametros = useParams();
    const post = posts.find(post => post.id === Number(parametros.id));

    if (!post) {
        return (<NaoEncontrada />);
    }

    return (
        <PaginaPadrao>
            <PostModelo
                fotoCapa={`/assets/posts/${post.id}/capa.png`}
                titulo={post.titulo}
            >
                <div className='post-markdown-container'>
                    <ReactMarkdown>
                        {post.texto}
                    </ReactMarkdown>
                </div>
            </PostModelo>
            <PostsRecomendados idPostAtual={post.id} />
        </PaginaPadrao>
    );
}