
FROM php:8.2-apache

# Copia archivos al contenedor
COPY . /var/www/html/

# Habilita módulos necesarios
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable pdo_mysql

# Configura permisos
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
