# Usa la imagen oficial de PHP con Apache como base
FROM php:apache

# Instala la extensión PDO MySQL
RUN docker-php-ext-install pdo_mysql

# Copia tu código fuente al directorio de trabajo en el contenedor
COPY . /var/www/html

# Expone el puerto 80 para el servidor web
EXPOSE 80

# Comando para iniciar Apache al ejecutar el contenedor
CMD ["apache2-foreground"]
