# Dockerfile para servir el proyecto con Apache + PHP
FROM php:8.2-apache

# Copiamos todo el proyecto al contenedor y asignamos permisos al usuario www-data
COPY --chown=www-data:www-data . /var/www/html/

# Copiar configuración PHP personalizada (si existe)
# php.ini está dentro de la carpeta docker en el contexto de build
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini

# Cambiamos DocumentRoot de Apache a /var/www/html/public y activamos rewrite
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && a2enmod rewrite \
    && chown -R www-data:www-data /var/www/html

# Definir ServerName para evitar advertencia al iniciar Apache
RUN echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

EXPOSE 80

# Usamos el CMD por defecto del contenedor (Apache)
