FROM php:8.2-fpm-alpine

# Instalação de extensões PHP necessárias para Laravel e outras funcionalidades
RUN apk add --no-cache \
    curl \
    mysql-client \
    nginx \
    nodejs \
    npm \
    git \
    zip \
    unzip \
    shadow \
    acl \
    && docker-php-ext-install pdo_mysql

# Instalação do Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Define o diretório de trabalho dentro do contêiner
WORKDIR /var/www/html

# Cria os diretórios Laravel para garantir que existam no volume
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Copia o script de entrada
COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expor a porta 9000 para o Nginx (PHP-FPM)
EXPOSE 9000

# Define o script como entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# CMD padrão (será executado pelo entrypoint script)
CMD ["php-fpm"]