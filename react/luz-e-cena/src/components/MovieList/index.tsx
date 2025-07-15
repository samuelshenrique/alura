import styles from './MovieList.module.css'
import CardMovie from '../CardMovie';
import type { Movie } from '../../types';

interface MovieListProps {
    movies: Movie[]
}

function MovieList({movies}: MovieListProps) {
  return (
    <ul className={styles.lista}>
        {movies.map(movie => <CardMovie key={movie.id} {...movie} />
    )}
    </ul>
  )
}

export default MovieList