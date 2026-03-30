FROM php:8.4-fpm

# Instalar dependências
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && pecl install redis \
    && docker-php-ext-enable redis

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiar arquivos
COPY . .

# Permissões
RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
