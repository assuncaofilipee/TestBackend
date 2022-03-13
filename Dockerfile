FROM ambientum/php:8.0-nginx

WORKDIR /app

COPY --chown=ambientum:ambientum . /app

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install
