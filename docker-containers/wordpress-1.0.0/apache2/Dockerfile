FROM wordpress
#Install git
RUN apt-get update \
    && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
#Install nano
RUN apt-get install nano -y
COPY sites-available/ /etc/apache2/sites-available/
RUN a2ensite wordpress.conf
EXPOSE 80
