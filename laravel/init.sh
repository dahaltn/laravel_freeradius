#!/bin/bash

/bin/sed -i "s/DocumentRoot\ \/var\/www\/html/DocumentRoot\ \/var\/www\/html\/public/g" /etc/apache2/sites-available/000-default.conf
# Start the freeradius service
/etc/init.d/freeradius start

/usr/sbin/apachectl -DFOREGROUND

