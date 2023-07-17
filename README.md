# EmCash - Júnior Backend Test 
Este é um teste para a vaga de desenvolvedor backend júnior na EmCash. A finalidade do teste é criar uma API para o cadastro de triângulos e retângulos, e obter a soma total da área de todos os polígonos cadastrados no sistema.

## Configuração do Projeto
Siga as instruções abaixo para configurar e executar o projeto em sua máquina.

### Pré-requisitos
- Git
- Docker (opcional)
- Composer
- PHP

### Instalação
```sh
    # Clone o repositório
    > git clone https://github.com/Casmei/emcash-polygon.git

    # Acesse a pasta do projeto
    > cd emcash-polygon

    # Crie o arquivo de configuração das variáveis de ambiente (Linux)
    > cp .env.example .env

    # Crie o arquivo de configuração das variáveis de ambiente (Windows)
    > copy .env.example .env
```
### Iniciando com Docker (😊 Happy path )
Se você tiver o Docker instalado em sua máquina, pode seguir estes passos:
```sh
    # Construa os containers
    > docker compose up --build
```
### Iniciando sem Docker
Se você não tiver o Docker instalado, siga estes passos:
```sh
    # Instale as dependências do projeto com o Composer
    > composer install

    # Gere a chave de segurança requisitada pelo Laravel
    > php artisan key:generate

    # Execute as migrações do banco de dados
    > php artisan migrate

    # Inicie o sistema
    > php artisan serve
```

### Documentação
A documentação do projeto é feita utilizando o Swagger. Para acessar a documentação, basta abrir o seguinte URL no seu navegador:

http://127.0.0.1:8000/api/documentation

## Rotas

| Verbo Http     |Rota                           |Parâmetros |
|----------------|-------------------------------|-----------|
|POST|`api/triangles`| base, side1, side2 |
||
|POST|`api/rectangles`|  base, height |
||
|GET|`api/total-area`|

## Testes
Para executar os testes de integração e unitários, utilize o seguinte comando:
### Com Docker
```sh
    # Entre no container da aplicação
    > docker exec -itu 0 emcash-polygon-main-1 sh

    # Execute os testes
    > php artisan test
```

### Sem o Docker
```sh
    # Execute os testes
    > php artisan test
```


