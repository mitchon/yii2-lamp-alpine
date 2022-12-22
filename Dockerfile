#pull latest verison of alpine from dockerhub
FROM alpine:latest
#update apk and install needed packages
RUN apk update && apk upgrade --no-cache
RUN apk add --no-cache apache2 php-apache2
RUN apk add --no-cache php-xml php-xmlwriter php-mbstring php-mysqli php-pdo php-pdo_mysql php-dom php-tokenizer php-bz2 php-exif php-session php-gd php-fileinfo
RUN apk add --no-cache composer

#copy configs and data
COPY httpd.conf /etc/apache2/
WORKDIR /var/www/localhost/htdocs
RUN rm index.html
COPY index.php phpinfo/index.php
COPY phpMyAdmin phpMyAdmin
COPY basic basic
#configure rights in site directory
RUN chown -R apache:apache basic
RUN chmod a+w basic
WORKDIR basic
#configure composer for yii
RUN composer update
EXPOSE 80
#run httpd
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]