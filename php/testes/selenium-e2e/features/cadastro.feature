Funcionalidade: Registro de usuários
    Como visitante
    Quero pode me registrar
    Para poder controlar minhas séries

    Cenário:
        Dado que estou com o navegador aberto
        E estou em "http://0.0.0.0:8080/novo-usuario"
        Quando preencho o formulário com informações válidas
        E envio esse formulário
        Então eu devo ser redirecionado para página de lista de séries
        E ver o link "Sair"