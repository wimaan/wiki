#!/bin/sh

cd -- "$(dirname -- $0)"

set -a; . ../env; set +a

cd ..

# get the id of the container running php-fpm
db_cont_id=$(docker ps --format '{{ .ID }}:::{{ .Image }}' | grep php-fpm | cut -d':' -f 1)

# run the update script
docker exec $db_cont_id php /var/www/wimaan.org/w/maintenance/update.php
# ensure non-exec images
docker exec $db_cont_id chmod -R 755 /var/www/wimaan.org/w/images