#!/usr/bin/env bash

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

# download mediawiki archive
wget --output-document ./mw.tar.gz https://releases.wikimedia.org/mediawiki/$MW_VERSION_SHORT/mediawiki-$MW_VERSION.tar.gz
# and signature
wget --output-document ./mw.tar.gz.sig https://releases.wikimedia.org/mediawiki/$MW_VERSION_SHORT/mediawiki-$MW_VERSION.tar.gz.sig


# TODO: verify that the archive has the same sig as provided,
# gpg --fetch-keys https://www.mediawiki.org/keys/keys.txt
# gpg --verify mw.tar.gz.sig mw.tar.gz


# extract the archive
tar -xf mw.tar.gz

# rename folder to w for ease
mv "mediawiki-$MW_VERSION" w

# clean up
rm ./mw.tar.gz
rm ./mw.tar.gz.sig