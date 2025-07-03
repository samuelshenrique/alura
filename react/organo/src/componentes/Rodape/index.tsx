import './Rodape.css';

const Rodape = () => {
    return(
        <footer className='rodape'>
            <div className='fundo' style={{backgroundImage: "url('/imagens/fundo.png')" }}>
                <div className='redes-sociais'>
                    <a href='https://facebook.com/organo/'>
                        <img src='/imagens/fb.png' alt='Facebook do Organo' />
                    </a>
                    <a href='https://x.com/organo/'>
                        <img src='/imagens/tw.png' alt='Twitter do Organo' />
                    </a>
                    <a href='https://instagram.com/organo/'>
                        <img src='/imagens/ig.png' alt='Instagram do Organo' />
                    </a>
                </div>
                <img src='/imagens/logo.png' className='logo' alt='Logo do Organo' />
                <p>Desenvolvido por Alura.</p>
            </div>
        </footer>
    );
}

export default Rodape;