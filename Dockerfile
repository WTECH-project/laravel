FROM php:8.0.12-fpm

RUN apt-get update

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer​ | php -- \
    --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# download product sample images
RUN mkdir ./storage/app/public
RUN curl https://cdn.pixabay.com/photo/2014/04/05/11/38/nike-316449_960_720.jpg > ./storage/app/public/1.jpg
RUN curl https://cdn.pixabay.com/photo/2014/04/05/11/38/nike-316449_960_720.jpg > ./storage/app/public/2.jpg
RUN curl https://cdn.pixabay.com/photo/2020/07/15/18/26/footwear-5408643_960_720.jpg > ./storage/app/public/3.jpg
RUN curl https://cdn.pixabay.com/photo/2020/07/15/18/26/footwear-5408643_960_720.jpg > ./storage/app/public/4.jpg

RUN composer install

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]