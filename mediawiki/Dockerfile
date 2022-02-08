FROM alpine:latest

# WORKDIR /tmp
# RUN wget -q https://releases.wikimedia.org/mediawiki/1.37/mediawiki-1.37.1.tar.gz \
#       && tar -xzf mediawiki-1.37.1.tar.gz \
#       && mkdir -p /srv \
#       && mv /tmp/mediawiki-1.37.1 /srv/mediawiki

COPY ./old.tar /tmp/dump.tar
RUN mkdir -p /var/www/wimaan.org/w; tar -xf /tmp/dump.tar -C /var/www/wimaan.org/w