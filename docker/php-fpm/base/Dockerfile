FROM composer:2.1.5 AS composer-img
FROM php:8.1.14-fpm-alpine3.17

ENV TZ=Europe/Minsk

ADD https://github.com/mlocati/docker-php-extension-installer/releases/download/1.2.53/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions

RUN apk add --no-cache \
    tzdata \
    bash \
    su-exec \
    shadow \
    && groupmod -o -g 1000 www-data && usermod -o -u 1000 -g www-data www-data \
    && apk del shadow \
;

RUN echo "date.timezone=$TZ" > "$PHP_INI_DIR/conf.d/date-time-zone.ini" && \
    mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
;

RUN chown www-data:www-data /var/www/html/

WORKDIR /var/www/html

COPY --from=composer-img /usr/bin/composer /usr/bin/composer
