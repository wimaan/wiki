#!/usr/bin/env bash

cd -- "$(dirname -- $0)"

set -a; . ../env; set +a

# run containers
cd ..
docker compose up --build -d

sleep 5

cd blackbox
# copy over the database
./restore-db.sh old.sql