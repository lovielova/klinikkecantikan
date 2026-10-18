FROM php:8.3-cli
WORKDIR /var/www
RUN apt-get update && apt-get install -y \
    curl zip unzip git supervisor \
    && docker-php-ext-install pdo pdo_mysql sockets
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --ignore-platform-req=ext-sockets
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
EXPOSE 8000
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
