ARG PHP_VERSION=8.3
ARG ALPINE_VERSION=3.18

# Set master image
FROM php:${PHP_VERSION}-fpm-alpine${ALPINE_VERSION}

# Set working directory
WORKDIR /var/www/html

# Install Additional dependencies
RUN apk add --no-cache \
    build-base linux-headers shadow nano curl

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# https://stackoverflow.com/a/45976380
RUN apk add --no-cache --virtual buildDeps autoconf \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del buildDeps

RUN apk add --no-cache icu-dev icu-data-full \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Remove Cache
RUN rm -rf /var/cache/apk/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

# https://github.com/docker-library/php/issues/225#issuecomment-226870896
# https://github.com/docker-library/php/issues/912#issuecomment-559918036
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

RUN docker-php-ext-install exif \
    && docker-php-ext-enable exif

# Tamaño de subida máximo en PHP
COPY php/limits.ini /usr/local/etc/php/conf.d/php_limits.ini

# Caché de PHP
RUN docker-php-ext-install opcache
COPY php/opcache.ini /usr/local/etc/php/conf.d/php_opcache.ini

# Remove Cache
RUN rm -rf /var/cache/apk/*

# https://github.com/npm/uid-number/issues/3
ENV NPM_CONFIG_UNSAFE_PERM=true

# Node
RUN apk add --update --no-cache nodejs-current npm

# Utils
RUN apk add --update --no-cache bash nano

RUN docker-php-ext-install bcmath && docker-php-ext-enable bcmath

# Add UID '1000' to www-data
RUN usermod -u 1000 www-data

RUN chown www-data:www-data /var/www/html

# Change current user to www
USER www-data

# Bash prompt
RUN echo "PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\W\[\033[00m\]\$ '" >> /home/www-data/.bashrc

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

# App
WORKDIR /var/www/html/laravel
