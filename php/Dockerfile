FROM php:7.4-apache

# Habilitar o mod_rewrite do Apache
RUN a2enmod rewrite

# Instala os pacotes necessários para o PostgreSQL e Composer
RUN apt-get update && apt-get install -y \
    libpq-dev \
    curl \
    unzip \
    && docker-php-ext-install pgsql pdo_pgsql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean

# Copia os arquivos da aplicação para o container
COPY ./src /var/www/html/

# Habilita as extensões
RUN docker-php-ext-enable pgsql pdo_pgsql

# Reiniciar o Apache para garantir que as configurações sejam aplicadas
RUN service apache2 restart
