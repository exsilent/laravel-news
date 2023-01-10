FROM php:8.1-fpm-alpine

RUN apk add --update --no-cache \
    curl \
    zsh \
    zip \
    shadow \
    autoconf \
    bash

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions xdebug pdo_mysql

#COPY ./conf.d/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

RUN mkdir /var/.composer \
  && chown www-data:www-data /var/.composer

ENTRYPOINT ["bash", "/var/www/entrypoint.dev.sh"]

USER www-data

CMD ["php-fpm"]
