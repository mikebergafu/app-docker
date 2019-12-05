# =========================================================
# Apache-PHP
#
# PHP-Apache docker image for php related web applications with
# 
# version:1.0
#
# OS:Debian, Web Server:Apache 2
#
# with some additional php modules
# =========================================================
# Additional php modules
#
# - pdo_mysql
# =========================================================
# Additional php PECL modules
#
# - redis
# =========================================================
# Additional linux packages via apt-get
#
# - nano
# - iputils-ping
# - mlocate
# - git
# - unzip
# =========================================================

ARG PHP_DOCKER_VERSION=""


FROM php:${PHP_DOCKER_VERSION}-apache


MAINTAINER Aldrich Saltson <aldrich.saltson@txtghana.com>


### Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"


### install linux packages
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libssl-dev \
    mlocate \
    iputils-ping \
    nano \
    &&  docker-php-ext-install -j$(nproc) bcmath \
    &&  docker-php-ext-install -j$(nproc) mysqli \
    &&  docker-php-ext-install -j$(nproc) pdo pdo_mysql


## install pecl packages
RUN pecl install \
         redis \
         && docker-php-ext-enable redis


## install composer
RUN curl -sS "https://getcomposer.org/installer" | php && \
    mv composer.phar /usr/local/bin/composer


### copy and change modifications of entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh


### copy apache2 configurations
COPY default-vhost.conf /etc/apache2/sites-enabled/default-vhost.conf


### initialize mlocatedb
RUN updatedb


### enable apache2 mods
RUN a2enmod rewrite


## EXECUTE
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
