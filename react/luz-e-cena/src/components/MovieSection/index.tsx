import styles from './MovieSection.module.css'
import InputText from '../InputText'
import Fieldset from '../Fieldset'
import Button from '../Button'
import { FaSearch } from 'react-icons/fa'
import MovieList from '../MovieList'
import useFetchMovies from '../../hooks/useFetchMovies'

function MovieSection() {
    const { movies, error, isLoading} = useFetchMovies();

    return (
        <main>
            <section className={styles.container}>
                <Fieldset variant='secondary'>
                    <InputText placeholder='Buscar filmes...' />
                    <Button variant='icon'>
                        <FaSearch />
                    </Button>
                </Fieldset>

                <h1 className={styles.titulo}>Em cartaz</h1>
                <p>error</p>
                <p>{isLoading ? 'LOADING' : 'SUCESSO'}</p>
                <MovieList movies={movies} />
            </section>
        </main>
    )
}

export default MovieSection