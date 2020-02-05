#!/bin/bash

# Start the freeradius service
/etc/init.d/freeradius start

/usr/sbin/apachectl -DFOREGROUND

