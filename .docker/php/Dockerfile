FROM php:8.4-fpm

WORKDIR /var/www/html
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

RUN apt update \
    && apt install -y \
    zlib1g-dev \
    g++ \
    git \
    libicu-dev \
    zip \
    libzip-dev \
    zip iputils-ping \
    libaio1 \
    libaio-dev \
    wget \
    libldap2-dev \
    curl
RUN install-php-extensions redis xsl intl opcache imap sockets apcu pdo pdo_mysql mysqli zip xml soap curl ldap mbstring openssl fileinfo http exif gd

# Install Composer
RUN curl -S https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN chown -R www-data:www-data /var/www/html

