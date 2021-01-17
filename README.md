Crud contact em laravel + jquery

Instalação e inicialização do projeto
- Clonar o repositório github
- Acessar a pasta raiz do projeto e executar o comando "composer install" para gerar a pasta vendor do projeto
- Inicie o servidor com o comando "php artisan serve" - http://localhost:8000/

Configurar database
- Criar um banco de dados para o projeto
- Editar o arquivo .env na raiz do projeto
- preencher as configurações do database: https://prnt.sc/wxwkgk
- Rodar as migrações com o comando "php artisan migrate"

Configuração de e-mail para ambiente de desenvolvimento
- Editar o arquivo .env na raiz do projeto
- usar as configurações do https://mailtrap.io: https://prnt.sc/wxrqi2

Configuração de e-mail para ambiente de produção
- Editar o arquivo .env na raiz do projeto
- Informar os acessos de um e-mail para autenticar o disparo: https://prnt.sc/wx4k78
OBS: Para contas gmail a opção permitir acesso de app deve estar ativada: https://prnt.sc/wwr8pg
https://myaccount.google.com/u/4/?hl=pt-BR

E-mails de Notificações
- MAIL_FROM_ADDRESS configurado no arquivo .env receberá uma notificação com os dados
- o e-mail informado no formulário receberá uma notificação de agradecimento

Rotas do projeto
- http://localhost:8000/ (formulário)
- http://localhost:8000/meus-contatos  (lista de contatos)

Técnologias
- Laravel framework
- Jquery
- Pré-compilador scss
- Test phpUnit

Por Rodrigo Monteiro
