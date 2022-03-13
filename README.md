# Teste Backend

## :red_circle: Sobre

Desafio Backend Pleno.

## :large_blue_circle: Tecnologias

 - [LARAVEL](https://laravel.com/)
 - [PHP](https://www.php.net/)

## :arrow_down: Clonar Repositório

```bash
    $ git clone https://github.com/filipeassuncao/backend.git
```
## :black_circle: Configuração

### Dependências:

Ao clonar o repositório, certifique-se de possuir o ***docker e docker-compose*** instalados e configurados em sua máquina local.

### Executando:

Na primeira vez que for iniciar o container, rode o comando que irá realizar a configuração do ambiente onde será executado a aplicação:


```bash
    $ docker-compose up --build -d
```

Para executar o projeto, entre no container;

```bash
     $ docker exec -it backend /bin/bash
```
e em seguinda, instale as depêndencias:

```bash
     $ composer install
```
Para executar o projeto:
```bash
     $ php artisan water:fill
```

## :orange_circle: Testes

Para executar todos os testes do projeto execute o comando:

```bash
     $ php artisan test
```
