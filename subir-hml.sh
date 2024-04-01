#!/bin/bash

# Renomear o arquivo .env-homolog para .env
mv /src/.env-homolog /src/.env

# Construir e iniciar os contêineres Docker
docker-compose up --build -d --services app nginx

# Instalar as dependências do Composer
docker compose run app composer install

# Executar as migrações do Laravel
docker compose run app php artisan migrate

# Iniciar o processo de trabalho da fila
docker compose run app php artisan queue:work