#!/usr/bin/env bash

# CREDIT: most functionality in this script is borrowed from metakgp's wiki source (https://github.com/metakgp/metakgp-wiki/blob/master/mediawiki/install_extensions.sh)

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

declare -a extension_names=( \
    GoogleLogin \
    PrivateDomains \
    HitCounters \
    Report \
    AJAXPoll \
    CreatePageUw \
    WikiSEO \
    TemplateStyles \
    UserMerge \
    Echo \
    Popups \
)

declare -A extension_version_overrides=( \
)

declare -a skin_names=( \
)

MEDIAWIKI_RELEASE=$MW_REL

function fetch_extension_url() {
    curl -s "https://www.mediawiki.org/wiki/Special:ExtensionDistributor?extdistname=$1&extdistversion=$2" \
        | grep -oP 'https://extdist.wmflabs.org/dist/extensions/.*?.tar.gz' \
        | head -1
}

function fetch_skin_url() {
    curl -s "https://www.mediawiki.org/wiki/Special:SkinDistributor?extdistname=$1&extdistversion=$2" \
        | grep -oP 'https://extdist.wmflabs.org/dist/skins/.*?.tar.gz' \
        | head -1
}

# fetch and extract extensions
for extension_name in "${extension_names[@]}"; do
    version=$MEDIAWIKI_RELEASE
    if [[ -v "extension_version_overrides[$extension_name]" ]]; then
	    version=${extension_version_overrides[$extension_name]}
    fi

    versioned_extension_url=$(fetch_extension_url $extension_name $version)
    versioned_extension_name=$(echo $versioned_extension_url | awk -F"/" '{print $(NF)}')

    wget -q $versioned_extension_url
    tar -xzf "$versioned_extension_name"

    mv $extension_name ./w/extensions/
    rm $versioned_extension_name
done

# fetch and extract skins
for skin_name in "${skin_names[@]}"; do
    versioned_skin_url=$(fetch_skin_url $skin_name $MEDIAWIKI_RELEASE)
    versioned_skin_name=$(echo $versioned_skin_url | awk -F"/" '{print $(NF)}')

    wget -q $versioned_skin_url
    tar -xzf "$versioned_skin_name"

    mv $skin_name ./w/skins/
    rm $versioned_skin_url
done

cd ./w/extensions
git clone https://github.com/edwardspec/mediawiki-moderation.git
mv mediawiki-moderation Moderation
cd ../..

cd ./w/skins
git clone https://github.com/StarCitizenTools/mediawiki-skins-Citizen/
mv mediawiki-skins-Citizen Citizen
cd ../..