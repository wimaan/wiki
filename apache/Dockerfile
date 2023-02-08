FROM debian:stable-slim

# Why Debian? Currently just to switch rapidly (a2enmod, a2ensite, and familiarity).
# What does a2ensite do? https://serverfault.com/questions/472954/a2ensite-equivalent-in-centos
# What does a2enmod do? https://github.com/nimmis/docker-alpine-apache/issues/2 (do read the httpd.conf file yourself)
# There is a MAJOR size difference though. TODO: switch to alpine

RUN apt update -y; apt install -y apache2 apache2-utils; apt install -y libapache2-mod-fcgid

COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./wimaan.org.conf /etc/apache2/sites-available/wimaan.org.conf

RUN a2enmod rewrite;\
    a2ensite wimaan.org;\
    a2dissite 000-default;\
    a2enmod proxy;\
    a2enmod proxy_fcgi;
    
# TODO: validate the config: apache2ctl configtest
    
EXPOSE 80 443

ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]

# RUN apt install -y python3-certbot-apache;\
#     certbot --apache --agree-tos --no-eff-email -m wimaan@smail.iitm.ac.in -d wimaan.org ;
    
# TODO: add test for certbot renewal