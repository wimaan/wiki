#!/bin/sh

# e: stop execution on an error in executing a script command
# u: treat unset variable usage as errors
# x: print commands before executing them
set -eux

# change to the directory containing this script
cd -- "$(dirname $0)"

# read version info
set -a; . ../ver; set +a

# change to the main build directory
cd ../out

if [ ! -f "../images.tar.gz" ];
then
    echo "No media archive found."
    exit 0;
fi

tar -xzf ../images.tar.gz -C w/