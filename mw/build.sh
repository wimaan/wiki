#!/usr/bin/env bash

# e: stop execution on an error in executing a script command
# u: treat unset variable usage as errors
# x: print commands before executing them
set -eux

# change to the directory containing this script
cd -- "$(dirname $0)"

# read version info
set -a; . ./ver; set +a

# ensure the out directory exists and is empty
if [ ! -d "out" ];
then
    mkdir out
else
    if [ ! -z "$(ls -A out)" ];
    then
        echo "*** The output directory (out) is not empty. Please run clean.sh.";
        exit 1;
    fi
fi

# fetch MW
./build/fetch-mw.sh
# fetch EXT
./build/fetch-ext.sh
# patch
./build/patch.sh
# put localsettings
./build/put-config.sh
# restore media
./build/restore-media.sh

# put logo, index
cp logo.svg ./out/w/logo.svg
cp index.html ./out/index.html

cd out
tar -cf ../old.tar ./*