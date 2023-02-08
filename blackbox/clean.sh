#!/bin/sh

cd -- "$(dirname $0)"
cd ..

read -p "This script may be DANGEROUS. Do you know what you are doing? [y/N] " yn
case $yn in
    [Yy]* ) echo OK.;;
    * ) exit;;
esac


echo "Stopping wiki containers."
docker compose stop
echo "Removing wiki containers."
yes | docker compose rm
echo "Removing all unused containers."
yes | docker system prune -a
echo "Removing wiki volumes."
docker volume rm wiki_code-vol
docker volume rm wiki_db-vol
docker volume rm wiki_media-vol
echo "Done."