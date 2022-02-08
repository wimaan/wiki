#!/bin/sh

set -a; . ../env; set +a

# run containers
docker compose up --build -d

sleep 5

# copy over the database
./restore-db.sh old.sql