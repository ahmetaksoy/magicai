FROM php:8.1-apache

RUN apt-get update

RUN apt-get install -y libzip-dev
RUN apt-get install -y zip
RUN apt-get install -y unzip
RUN apt-get install -y libonig-dev
RUN apt-get install -y curl
RUN apt-get install -y mariadb-client
RUN apt-get install -y pkg-config
RUN apt-get install -y libxml2-dev
RUN apt-get install -y libcurl4-openssl-dev

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install xml
RUN docker-php-ext-install ctype
RUN docker-php-ext-install dom
RUN docker-php-ext-install curl
RUN docker-php-ext-install fileinfo
RUN docker-php-ext-install filter
RUN docker-php-ext-install session
RUN docker-php-ext-install zip

RUN a2enmod rewrite
RUN a2enmod ssl

WORKDIR /var/www/html

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html && chmod -R 775 /var/www/html

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN php artisan migrate

EXPOSE 80

CMD ["apache2-foreground"]