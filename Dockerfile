# Build Node Dependencies
FROM node:18 as node-dependencies
WORKDIR /app
COPY package.json .
COPY package-lock.json .
RUN npm ci

# Build Composer Dependencies
FROM composer:2 AS composer-dependencies

WORKDIR /var/www/html
COPY composer* ./

RUN composer install \
  --no-interaction \
  --prefer-dist \
  --ignore-platform-reqs \
  --optimize-autoloader \
  --apcu-autoloader \
  --ansi \
  --no-scripts

FROM php:8.1-fpm as base
LABEL maintainer="Jordan Jones (@heyjordn)"

ARG PHP_VERSION='8.1'

ENV BUILD_PHP_VERSION=$PHP_VERSION \
    DEBIAN_FRONTEND=noninteractive \
    S6_BEHAVIOUR_IF_STAGE2_FAILS=2 \
    S6_CMD_WAIT_FOR_SERVICES_MAXTIME=0 \
    S6_VERBOSITY=1 \
    VOLT_HOME="/var/www/html" \
    VOLT_USER="volt" \
    VOLT_GROUP="voltgroup" \
    PUID=9999 \
    PGID=9999

# Overlay S6
ARG S6_OVERLAY_VERSION=3.1.2.1

ADD https://github.com/just-containers/s6-overlay/releases/download/v${S6_OVERLAY_VERSION}/s6-overlay-noarch.tar.xz /tmp
RUN tar -C / -Jxpf /tmp/s6-overlay-noarch.tar.xz
ADD https://github.com/just-containers/s6-overlay/releases/download/v${S6_OVERLAY_VERSION}/s6-overlay-x86_64.tar.xz /tmp
RUN tar -C / -Jxpf /tmp/s6-overlay-x86_64.tar.xz

# Copy over S6 configurations
COPY --chmod=755 deployment/etc/s6-overlay /etc/s6-overlay/

ADD deployment/php-packages/${PHP_VERSION}/libs.txt /tmp/libs.txt


RUN apt-get update \
    # Configure web user and group
    && groupadd -r -g $PGID $VOLT_GROUP \
    && useradd --no-log-init -r -s /usr/bin/bash -d $VOLT_HOME -u $PUID -g $PGID $VOLT_USER \
    \
    # Install dependencies
    && apt-get -y --no-install-recommends install \
        ca-certificates \
        curl \
        git \
        unzip \
        # Installs needed OS Libs
        $(cat /temp/libs.txt); \
    # Install mysql
    docker-php-ext-install pdo_mysql; \
    # Install zip
    docker-php-ext-configure zip && docker-php-ext-install zip; \
    # Install mbstring
    docker-php-ext-install mbstring; \
    # Installs GD extension
    docker-php-ext-configure gd \
                --prefix=/usr \
                --with-jpeg \
                --with-webp \
                --with-freetype \
    docker-php-ext-install gd; \
    # Include OPcache for extra performance
    docker-php-ext-install opcache; \
    # Install redis
    pecl -q install -o -f redis \
        && rm -rf /tmp/pear \
        && docker-php-ext-enable redis; \
    \
    docker-php-ext-install pcntl; \
    # Installs BCMath
    docker-php-ext-install bcmath; \
    # Install Pgsql extension
    docker-php-ext-install pdo_pgsql; \
    # Install Pgsql extension
    docker-php-ext-install pgsql; \
    # Cleanup sources
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install PHP FPM
ENV PHP_DATE_TIMEZONE="UTC" \
    PHP_DISPLAY_ERRORS=On \
    PHP_ERROR_REPORTING="E_ALL & ~E_DEPRECATED & ~E_STRICT" \
    PHP_MEMORY_LIMIT="256M" \
    PHP_MAX_EXECUTION_TIME="99" \
    PHP_OPEN_BASEDIR="$VOLT_HOME:/dev/stdout:/tmp" \
    PHP_POST_MAX_SIZE="100M" \
    PHP_UPLOAD_MAX_FILE_SIZE="100M" \
    PHP_POOL_NAME="www" \
    PHP_PM_CONTROL=dynamic \
    PHP_PM_MAX_CHILDREN="20" \
    PHP_PM_START_SERVERS="2" \
    PHP_PM_MIN_SPARE_SERVERS="1" \
    PHP_PM_MAX_SPARE_SERVERS="3"


RUN apt-get update \
    && apt-get install -y libfcgi-bin \
    # Install `php-fpm-healthcheck`
    && curl -o /usr/local/bin/php-fpm-healthcheck https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/master/php-fpm-healthcheck \
    && chmod +x /usr/local/bin/php-fpm-healthcheck \
    # set pool name to be configurable by env
    # RUN sed -i -e 's/\[www\]/\[$\{PHP_POOL_NAME\}]/g' /usr/local/etc/php/fpm/pool.d/www.conf \
    # Cleanup sources
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* /var/www/html/*

COPY deployment/etc/php/fpm/pool.d /usr/local/etc/php-fpm.d/

ENV MSMTP_RELAY_SERVER_HOSTNAME="mailhog" \
    MSMTP_RELAY_SERVER_PORT="1025" \
    SSL_MODE="none"

# Install`nginx` (web server) & `msmtp` (smtp client)
RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        msmtp \
        msmtp-mta \
        nginx \
    \
    # Ensure volt user permissions are correct
    && chown -R $VOLT_USER:$VOLT_GROUP /var/www/html/ \
    \
    # Cleanup sources
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* /var/www/html/* \
    && rm -f /etc/nginx/sites-enabled/default

COPY deployment/etc/nginx /etc/nginx/

# Copy source and configure Laravel folders
WORKDIR /var/www/html

COPY . .

# Get Node and Composer Dependencies
COPY --from=composer-dependencies /var/www/html/vendor vendor
COPY --from=node-dependencies /app/node_modules node_modules

RUN mkdir -p \
  storage/framework/{sessions,views,cache} \
  storage/logs \
  bootstrap/cache \
  && chown -R volt:voltgroup \
  public \
  storage \
  bootstrap/cache \
  && chmod -R ug+rwx storage bootstrap/cache

EXPOSE 80
EXPOSE 443

ENTRYPOINT ["/init"]
