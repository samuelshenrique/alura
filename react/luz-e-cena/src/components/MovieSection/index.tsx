import styles from './MovieSection.module.css'
import InputText from '../InputText'
import Fieldset from '../Fieldset'
import Button from '../Button'
import { FaSearch } from 'react-icons/fa'
import MovieList from '../MovieList'
import useFetchMovies from '../../hooks/useFetchMovies'
import useFilterMovies from '../../hooks/useFilterMovies'

function MovieSection() {
    const { movies, error, isLoading} = useFetchMovies();
    const { searchTerm, setSearchTerm, filteredMovies, handleSearch } = useFilterMovies(movies);

    return (
        <main>
            <section className={styles.container}>
                <Fieldset variant='secondary'>
                    <InputText
                        placeholder='Buscar filmes...'
                        value={searchTerm}
                        onChange={(event: React.ChangeEvent<HTMLInputElement>) =>
                            setSearchTerm(event.target.value)}
                    />
                    <Button variant='icon' onClick={handleSearch}>
                        <FaSearch />
                    </Button>
                </Fieldset>

                <h1 className={styles.titulo}>Em cartaz</h1>
                {isLoading && <p>Carregando filmes...</p>}
                {error && <p className={styles.error}>{error}</p>}
                <p>{isLoading ? 'LOADING' : 'SUCESSO'}</p>
                <MovieList movies={filteredMovies} />
            </section>
        </main>
    )
}

export default MovieSection