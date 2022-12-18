FROM alpine:latest
RUN apk update && apk upgrade --no-cache
RUN apk add --no-cache apache2 php-apache2
RUN apk add --no-cache php-xml php-xmlwriter php-mbstring php-mysqli php-pdo php-pdo_mysql php-dom php-tokenizer php-bz2 php-exif php-session php-gd php-fileinfo
RUN apk add --no-cache composer

#COPY php.ini /etc/php81/
COPY httpd.conf /etc/apache2/
WORKDIR /var/www/localhost/htdocs
RUN rm index.html
COPY index.php phpinfo/index.php
COPY phpMyAdmin phpMyAdmin
COPY basic basic
RUN chown -R apache:apache basic
RUN chmod a+w basic
WORKDIR basic
#RUN composer update
EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]