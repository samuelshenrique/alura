import PostCard from 'componentes/PostCard';
import posts from 'json/posts.json';
import styles from './PostsRecomendados.module.css';

export default function PostsRecomendados({ idPostAtual }) {
    const postsRecomendados = posts
        .filter(post => idPostAtual !== post.id)
        .sort(() => 0.5 - Math.random())
        .slice(0, 4);

    return (
        <div className={styles.recomendacoes}>
            <h4 className={styles.titulo}>Outros posts que você pode gostar:</h4>
            <div className={styles.postsRecomendados}>
                {postsRecomendados.map(post => <PostCard key={post.id} post={post} />)}
            </div>
        </div>
    )
}