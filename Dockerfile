FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copiar proyecto
COPY . /var/www/html/

# Habilitar rewrite (opcional pero recomendado)
RUN a2enmod rewrite

# Cambiar SOLO DocumentRoot de forma segura
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80