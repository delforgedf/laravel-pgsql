# Install and Set Up Laravel with Docker Compose

Setting up Laravel in the local environment with Docker using the LEMP stack that includes: Nginx, MySQL, PHP, and phpMyAdmin.

## How to Install and Run the Project

1. ``` docker compose run app composer install ```
2. Copy ```.env.example``` to ```.env```
3. ```docker compose up --build -d```
4. ```docker compose run app php artisan migrate```
5. You can see the project on ```127.0.0.1:8080```


## How to run Laravel Commands with Docker Compose

1. ```cd src```
2. ```docker compose run app php artisan {your command}``` 
