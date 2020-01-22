FROM ubuntu:19.10
MAINTAINER Tej Dahal<dahaltn@gmail.com>

# silence package installations to that debpkg doesn't prompt for mysql
# passwords and other input
ARG DEBIAN_FRONTEND=noninteractive
ENV mysql_pass ""
# PHP,Apache2,MySQL and FreeRADIUS install
RUN apt-get update && \
	apt-get -y install php7.3 \
        php7.3-cli \
        php7.3-fpm \
	php7.3-common \
	php7.3-curl \
        php7.3-gd \
	php7.3-mysql \
	php7.3-zip \
	php-mail \
	php-mail-mime nano \
        php-pear \
        php-db \
	net-tools \
        apache2 \
	libapache2-mod-php7.3 \
        cron \
        nodejs \
        npm \
        curl \
        zip \
        unzip \
        git \
        iputils-ping \
	freeradius \
	freeradius-utils \
	freeradius-mysql \
	mysql-client \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* \
# PHP Pear DB library install
 && pear install DB \
 && pear install -a Mail \
 && pear install -a Mail_Mime

COPY init.sh /init.sh
RUN chown www-data.www-data -R /var/www/html

RUN /bin/sed -i 's/AllowOverride\ None/AllowOverride\ All/g' /etc/apache2/apache2.conf
RUN /bin/sed -i "s/display_errors\ \=\ Off/display_errors\ \=\ On/g" /etc/php/7.3/apache2/php.ini

# Make init.sh script executable
RUN chmod +x /init.sh

# Remove the original sample index.html file
RUN rm -rf /var/www/html/index.html
WORKDIR /var/www/html
# Setup composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt update && apt install yarn \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN ln -s /etc/freeradius/3.0/mods-available/sql /etc/freeradius/3.0/mods-enabled/sql

RUN a2enmod rewrite
# Expose Web & radius ports
EXPOSE 80 443 1812 1813


# Run Apache2 in the foreground as a running process

ENTRYPOINT ["/init.sh"]

