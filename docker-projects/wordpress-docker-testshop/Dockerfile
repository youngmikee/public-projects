FROM wordpress

# CKO - Plugin Dev Team
# DEV - Michael Ugborikoko

#Install git
RUN apt-get update \
    && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
#Install nano
RUN apt-get install nano -y
EXPOSE 80
