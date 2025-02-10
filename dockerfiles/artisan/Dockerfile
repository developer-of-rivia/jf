FROM php:8.3-cli

WORKDIR /var/www/jf

RUN apt-get update && apt-get install libpq-dev -y
RUN docker-php-ext-install pdo pdo_pgsql

CMD tail -f /dev/null