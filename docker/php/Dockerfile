FROM php:7.0-fpm

ENV PHPREDIS_VERSION php7

ENV PG_MAJOR 9.5
RUN apt-key adv --keyserver ha.pool.sks-keyservers.net --recv-keys B97B0AFCAA1A47F044F244A07FCC7D46ACCC4CF8
RUN echo 'deb http://apt.postgresql.org/pub/repos/apt/ jessie-pgdg main' $PG_MAJOR > /etc/apt/sources.list.d/pgdg.list

RUN apt-get update && apt-get install -y \
    ca-certificates \
    postgresql-client-$PG_MAJOR \
    git cron libpq-dev libxml2-dev \
    zlib1g-dev \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install soap \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath \
    # Phalcon
    && git clone --depth=1 -b 3.0.x git://github.com/phalcon/cphalcon.git /usr/local/src/cphalcon \
    && cd /usr/local/src/cphalcon/build && ./install \
    && echo "extension=phalcon.so" > /usr/local/etc/php/conf.d/25-phalcon.ini

    # Redis
RUN curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
    && mkdir -p /usr/src/php/ext/ \
    && tar xfz /tmp/redis.tar.gz \
    && rm -r /tmp/redis.tar.gz \
    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
    && docker-php-ext-install redis \

    # Composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add crontab file in the cron directory
ADD config/crontab /crontab_tmp

# Add php.ini
ADD config/php.ini /usr/local/etc/php/php.ini

ADD ./entrypoint.sh /

ENV PATH $PATH:/root/.composer/vendor/bin

CMD ["/entrypoint.sh"]

RUN ln -s /src/vendor/bin/phalcon.php /usr/bin/phalcon