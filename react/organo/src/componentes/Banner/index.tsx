import './Banner.css';

interface BannerProps {
    enderecoImagem: string
    textoAlternativo?: string
}

const Banner = ({enderecoImagem, textoAlternativo}: BannerProps) => {
    return (
        <>
            <header className="banner">
                {/* <img src="/imagens/banner.png" alt="O banner principal da página do Organo" /> */}
                <img src={enderecoImagem} alt={textoAlternativo} />
            </header>
            <h1>Teste</h1>
        </>
    );
}

export default Banner;