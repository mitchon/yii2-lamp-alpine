FROM alpine:latest
RUN apk update && apk upgrade --no-cache
RUN apk add --no-cache apache2 php-apache2
RUN apk add --no-cache php-xml php-xmlwriter php-mbstring php-mysqli php-pdo php-dom php-tokenizer php-bz2 php-exif php-session
RUN apk add --no-cache composer

#COPY php.ini /etc/php81/
#COPY httpd.conf /etc/apache2/
COPY index.php /var/www/localhost/htdocs/phpinfo/index.php
COPY phpMyAdmin /var/www/localhost/htdocs/phpMyAdmin
COPY basic /var/www/localhost/htdocs/basic
RUN chown -R apache:apache /var/www/localhost/htdocs/basic
WORKDIR /var/www/localhost/htdocs/basic
RUN composer update
#RUN composer require phpunit/phpunit ^9.5
#RUN composer create-project --prefer-dist yiisoft/yii2-app-basic basic
EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]