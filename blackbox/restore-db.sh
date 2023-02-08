#!/usr/bin/env bash

cd -- "$(dirname $0)"

set -a; . ../env; set +a

# sanity check: file supplied?
if [ $# -lt 1 ]
then
    echo "Usage: ./restore-db.sh dump-file"
    echo "      {dump-file}: path relative to this script"
    exit 1
fi

# get the id of a container running mariadb
db_cont_id=$(docker ps --format '{{ .ID }}:::{{ .Image }}' | grep mariadb:latest | cut -d':' -f 1)

# sanity check: was there any suitable container running?
if [ -z $db_cont_id ]
then
    echo "E: No container running with the mariadb:latest image"
    exit 1
fi

# sanity check: does file exist?
backup_file=${1}
if [ ! -f "$backup_file" ]
then
    echo "E: Supplied dump file ($backup_file) does not exist."
    exit 1
fi

# load the dump file
docker exec -i $db_cont_id mysql -uroot -p${DB_ROOT_PASS} < $backup_file

echo "Finished uploading dump."

# verify
admin_exists=$(echo "USE my_wiki; SELECT user_name FROM user WHERE user_name = 'Wimaan-admin';" | docker exec -i $db_cont_id mysql -uroot -p${DB_ROOT_PASS} | grep -o Wimaan-admin)
if [ "$admin_exists" == "Wimaan-admin" ]
then
    echo "Successful."
else
    echo "E: Failed : couldn't find admin user after dump."
    exit 1
fi