import { useEffect, useState } from "react";
import { getMovies } from "../api";
import type { Movie } from "../types";

const useFetchMovies = () => {
    const [movies, setMovies] = useState<Movie[]>([]);
    const [isLoading, setIsLoading] = useState<boolean>(false);
    const [error, setError] = useState<string | null>(null);

    const fetchMovies = async () => {
        setIsLoading(true);
        setError(null);

        try {
            const movies2 = await getMovies();
            setMovies(movies2);
        } catch (error) {
            setError('Erro ao busca filmes. Tente novamente');
            console.error(error);
        } finally {
            setIsLoading(false);
        }
    }

    useEffect(() => {
        fetchMovies();
    });

    return {
        movies,
        isLoading,
        error
    }
}

export default useFetchMovies