# Projeto Laravel com Jetstream e Docker

Este repositório contém uma aplicação Laravel utilizando Jetstream para autenticação, implementada em um ambiente de contêiner com Docker e Docker Compose.

## Pré-requisitos

Certifique-se de que você tenha os seguintes softwares instalados em sua máquina:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instalação

Siga os passos abaixo para configurar o projeto em seu ambiente local:

### 1. Clonar o repositório

```bash
git clone https://github.com/heningtonfrota/desafio-4juris.git
```

```bash
cd desafio-4juris
```

### 2. Configurar o arquivo .env
Copie o arquivo .env.example para .env e configure as variáveis necessárias, incluindo as informações de banco de dados:

```bash
cp .env.example .env
```

No arquivo .env, configure o nome do banco de dados, usuário e senha como no exemplo abaixo:

```bash
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=desafio_4juris
DB_USERNAME=admin_4juris
DB_PASSWORD=secret_4juris
```

### 3. Construir e iniciar os contêineres

Execute o comando abaixo para construir os contêineres e iniciar os serviços:

```bash
docker compose up -d
```
Este comando irá configurar os seguintes serviços:

App: Laravel rodando com PHP-FPM.
Postgres: Banco de dados Postgres.
Nginx: Servidor web para servir a aplicação Laravel.

### 4. Instalar as dependências

Depois que os contêineres estiverem em execução, execute o seguinte comando para instalar as dependências PHP:

```bash
docker compose exec app bash
```

### 5. Gerar chave da aplicação

Execute o seguinte comando para gerar a chave da aplicação Laravel:

```bash
php artisan key:generate
```
### 6. Rodar as migrações

Execute o seguinte comando para rodar as migrações e configurar o banco de dados:

```bash
php artisan migrate
```

### 7. Configurar o Jetstream
Este projeto utiliza o Jetstream com Livewire, e está pronto para autenticação. Se precisar configurar mais opções, pode rodar o seguinte comando:

```bash
npm install
```

```bash
npm run build
```
### Utilização

Acesse a aplicação em seu navegador utilizando o endereço:

- [App Local](http://localhost:30080)

### Lista de Urls
    - [Postman](https://app.getpostman.com/join-team?invite_code=2187a55191b165b6ef87a08ddc82265f&target_code=91faf8b0f0e68533bc0422f80e119f13)

### Estrutura do Projeto

- app: Contém o código fonte da aplicação Laravel.
- database: Arquivos relacionados ao banco de dados, como migrações e seeders.
- docker: Arquivos de configuração do Docker e Docker Compose.
- public: Pasta pública que contém o arquivo index.php.
- routes: Definições de rotas da aplicação.
- resources: Arquivos de frontend, como views e assets.

### Tecnologias Utilizadas

- Laravel: Framework PHP para desenvolvimento backend.
- Jetstream: Gerenciamento de autenticação e funcionalidades para Laravel.
- Docker: Containerização da aplicação para ambiente de desenvolvimento isolado.
- Docker Compose: Ferramenta para definir e gerenciar múltiplos contêineres.

### Licença

Este projeto está licenciado sob a MIT License.
