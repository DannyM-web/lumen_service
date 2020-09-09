FROM php:7.4-fpm-alpine3.12

RUN apk update &&\
    apk add --no-cache $PHPIZE_DEPS &&\
    docker-php-ext-install tokenizer mysqli pdo_mysql

#COPY ./app /var/www/app

WORKDIR /var/www/app

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" &&\
    php -r "if (hash_file('sha384', 'composer-setup.php') === '8a6138e2a05a8c28539c9f0fb361159823655d7ad2deecb371b04a83966c61223adc522b0189079e3e9e277cd72b8897') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" &&\
    php composer-setup.php --install-dir=/usr/bin --filename=composer &&\
    php -r "unlink('composer-setup.php');"
