# EmCash - Júnior Backend Test 
Para iniciar o projeto, basta abrir o terminal em sua máquina e executar os seguintes comandos na ordem exibida:
```sh
    # Clone o projeto
    > git clone https://github.com/Casmei/emcash-polygon.git

    # Entre na pasta
    > cd emcash-polygon

    # Gere as variaveis de ambiente do projeto
    > cp .env.example .env
```
Esse projeto é disposto pelo docker, caso deseje seguir por esse caminho, siga os comandos a seguir:
### Iniciando a aplicação com Docker
```sh
    # Construa as imagens da API
    > docker compose up --build

    # Entre na imagem docker em que está a API
    > docker exec -itu 0 emcash-polygon-main-1 sh
```
### Iniciando a aplicação em sua máquina
```sh
    # Instale as dependências do projeto
    > composer install

    # Inicie a API
    > php artisan serve
```
### Comandos para preparar sua aplicação
Esse passo é comum tanto para quem iniciou a aplicação com o docker ( dentro do bash da imagem ) ou diretamente em seu terminal:
```sh
    # Faça a migração para seu banco de dados
    > php artisan migrate
```

### Documentação
Esse projeto utiliza o [Swagger](https://swagger.io/) para documentar o projeto. </br> Para acessar, basta acessar essa rota [http://127.0.0.1:8000/api/documentation](http://127.0.0.1:8000/api/documentation) com a aplicação de pé

## Rotas

| Verbo Http     |Rota                           |
|----------------|-------------------------------|
|POST|`api/triangles` - parâmetros : base, side1, side2|
||
|POST|`api/rectangles` - parâmetros : base, height|
||
|GET|`api/total-area`|
