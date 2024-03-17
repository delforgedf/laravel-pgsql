# GeoHabitação

Projeto reponsável por demonstração dos dados de habitação do estado do Goiás


## Como instalar e executar o projeto

1. ``` docker compose run app composer install ```
2. Copy ```.env.dev``` to ```.env```
3. ```docker compose up --build -d```
4. ```docker compose run app php artisan migrate```
5. Projeto rodando ```127.0.0.1:8080``` ou ```localhost:8080```


## Como rodar comandos larave com Docker Compose

1. ```cd src```
2. ```docker compose run app php artisan {your command}``` 
