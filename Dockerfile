# Usa la imagen oficial de PHP con Apache como base
FROM php:apache

# Instala la extensión PDO MySQL
RUN docker-php-ext-install pdo_mysql

# Instala Xdebug
RUN pecl install xdebug \
 #   && docker-php-ext-enable xdebug

# Copia tu código fuente al directorio de trabajo en el contenedor
COPY . /var/www/html

# Expone el puerto 80 para el servidor web
EXPOSE 80

# Configura Xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Comando para iniciar Apache al ejecutar el contenedor
CMD ["apache2-foreground"]
