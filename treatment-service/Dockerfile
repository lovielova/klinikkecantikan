FROM php:8.3-cli
WORKDIR /var/www
RUN apt-get update && apt-get install -y \
    curl zip unzip git \
    && docker-php-ext-install pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
