#!/usr/bin/env bash

# e: stop execution on an error in executing a script command
# u: treat unset variable usage as errors
# x: print commands before executing them
set -eux

# change to the directory containing this script
cd -- "$(dirname $0)"

# read version info
set -a; . ../ver; set +a

# change to the {REPO}/mw directory
cd ..

# get patch list
patches=(patches/*)

# apply
for i in ${patches[*]};
do
    patch -p0 < ./$i
done