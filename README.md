### Установка

1. git clone https://github.com/developer-of-rivia/jf.git .
2. docker compose run composer install
3. создаём .env на основе .env.example в /src
4. заменить в env: (или в зависимости от вашей конфигурации)
```env
DB_CONNECTION=pgsql
DB_HOST=host.docker.internal
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=test
```

5. docker compose run artisan key:generate
6. docker compose up -d
7. docker compose run artisan migrate
8. docker compose run artisan db:seed --class=ProductSeeder

### Урлы
/ - каталог
/cart - корзина
/ty - страница Ваш заказ успешно создан!"

/orders - все заказы

/login /register /profile и т.д - по пакету laravel/breeze