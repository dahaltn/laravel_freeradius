FROM freeradius/freeradius-server:latest

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
	apt-get -y install net-tools \
	nano \
	mysql-client \
	iputils-ping \
        curl \
        zip \
        unzip \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* 

RUN ln -s /etc/freeradius/mods-available/sql /etc/freeradius/mods-enabled/sql