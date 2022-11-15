ARG COMPOSER_VERSION=latest
FROM composer:${COMPOSER_VERSION} AS vendor

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

#
FROM php:8.1-fpm as base

ARG S6_OVERLAY_VERSION=3.1.2.1

ADD https://github.com/just-containers/s6-overlay/releases/download/v${S6_OVERLAY_VERSION}/s6-overlay-noarch.tar.xz /tmp
RUN tar -C / -Jxpf /tmp/s6-overlay-noarch.tar.xz
ADD https://github.com/just-containers/s6-overlay/releases/download/v${S6_OVERLAY_VERSION}/s6-overlay-x86_64.tar.xz /tmp
RUN tar -C / -Jxpf /tmp/s6-overlay-x86_64.tar.xz


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

ADD deployment/php-packages/${PHP_VERSION}/libs.txt /tmp/libs.txt
ADD deployment/php-packages/${PHP_VERSION}/packages.txt /tmp/packages.txt


RUN apt-get update \
    \
    # configure web user and group
    && groupadd -r -g $PGID $VOLT_GROUP \
    && useradd --no-log-init -r -s /usr/bin/bash -d $VOLT_HOME -u $PUID -g $PGID $VOLT_USER \
    \
    # install dependencies
    && apt-get -y --no-install-recommends install \
        ca-certificates \
        curl \
        git \
        unzip \
    # cleanup
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY --chmod=755 deployment/etc/s6-overlay /etc/s6-overlay/


WORKDIR /var/www/html

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
    # install `php-fpm-healthcheck`
    && curl -o /usr/local/bin/php-fpm-healthcheck https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/master/php-fpm-healthcheck \
    && chmod +x /usr/local/bin/php-fpm-healthcheck \
    # set pool name to be configurable by env
    # RUN sed -i -e 's/\[www\]/\[$\{PHP_POOL_NAME\}]/g' /usr/local/etc/php/fpm/pool.d/www.conf \
    # cleanup
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* /var/www/html/*
#
COPY deployment/etc/php/fpm/pool.d /usr/local/etc/php-fpm.d/

ENV MSMTP_RELAY_SERVER_HOSTNAME="mailhog" \
    MSMTP_RELAY_SERVER_PORT="1025" \
    SSL_MODE="none"

# install`nginx` (web server) & `msmtp` (smtp client)
RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        msmtp \
        msmtp-mta \
        nginx \
    \
    # ensure volt user permissions are correct
    && chown -R $VOLT_USER:$VOLT_GROUP /var/www/html/ \
    \
    # cleanup
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* /var/www/html/* \
    && rm -f /etc/nginx/sites-enabled/default

# Copy over S6 configurations
COPY --chmod=755 deployment/etc/s6-overlay /etc/s6-overlay/

COPY deployment/etc/nginx /etc/nginx/

# COPY deployment/etc/php/fpm/pool.d /etc/php/current_version/fpm/pool.d/

COPY . .
COPY --from=vendor /var/www/html/vendor vendor

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
