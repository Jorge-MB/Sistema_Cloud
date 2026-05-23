FROM php:8.2-apache

# Instalar extensiones necesarias para PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiar proyecto al servidor Apache
COPY . /var/www/html/

# Configurar carpeta pública
WORKDIR /var/www/html/public

# Exponer puerto
EXPOSE 80