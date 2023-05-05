FROM php:7.3-fpm

WORKDIR .

ADD ./app /app

EXPOSE 9000