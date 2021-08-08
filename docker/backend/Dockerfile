FROM php:7.4-fpm
ENV TZ=Europe/Moscow
WORKDIR /pub/www/site
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    build-essential \
    libwebp-dev \
    curl \
    libcurl4 \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libicu-dev \
    libmemcached-dev \
    memcached \
    default-mysql-client \
    libmagickwand-dev \
    unzip \
    libzip-dev \
    libonig-dev \
    zip \
    zlib1g-dev \
    libzip-dev \
    libxml2-dev \
    libxslt1-dev \
    python-dev \
    nano \
    nginx \
    git \
    wget \
    supervisor \
    net-tools \
    nmap



RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install dom
RUN docker-php-ext-install posix
RUN docker-php-ext-install opcache
RUN docker-php-ext-install zip
RUN docker-php-ext-install xsl
RUN docker-php-ext-install gd
RUN docker-php-ext-install session
RUN docker-php-ext-install json
RUN docker-php-ext-install ctype
RUN docker-php-ext-install sockets


# install xdebug
RUN pecl install xdebug

RUN docker-php-ext-enable xdebug
RUN docker-php-ext-enable opcache
RUN docker-php-ext-enable ctype
RUN docker-php-ext-enable session
RUN docker-php-ext-enable json
RUN docker-php-ext-enable gd
RUN docker-php-ext-enable xsl
RUN docker-php-ext-enable zip
RUN docker-php-ext-enable posix
RUN docker-php-ext-enable dom
RUN docker-php-ext-enable pdo
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-enable mbstring
RUN docker-php-ext-enable sockets


# configure opcache
RUN echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/opcache-recommended.ini
RUN echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/opcache-recommended.ini
RUN echo "opcache.max_accelerated_files=4000" >> /usr/local/etc/php/conf.d/opcache-recommended.ini
RUN echo "opcache.revalidate_freq=2" >> /usr/local/etc/php/conf.d/opcache-recommended.ini
RUN echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/opcache-recommended.ini

# install imagick
RUN pecl install imagick-3.4.4
RUN docker-php-ext-enable imagick

# install composer
RUN cd /tmp \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# clean image
RUN apt-get clean
EXPOSE 9000
EXPOSE 9003
