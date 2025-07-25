import styles from './CardMovie.module.css'
import Tag from '../Tag'
import type { Movie } from '../../types'

function CardMovie({ alt, src, titulo, genero, categoria, censura, duracao }: Movie) {
    return (
        <li className={styles.card}>
            <img src={src} alt={alt} />
            <div className={styles.container}>
                <h3>{titulo}</h3>
                <div className={styles.informacoes}>
                    <div className={styles.linha1}>
                        <p>{genero}</p>
                        <Tag value={categoria} />
                    </div>
                    <div className={styles.linha2}>
                        <p>{duracao} min</p>
                        <Tag value={censura} />
                    </div>
                </div>
            </div>
        </li>
    )
}

export default CardMovie