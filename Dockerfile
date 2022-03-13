FROM ambientum/php:8.0-nginx

WORKDIR /app

COPY --chown=ambientum:ambientum . /app

RUN composer install &&  composer dumpautoload
