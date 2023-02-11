<?php

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}



################## Core site configuration

$wgSitename = "Wimaan";
## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/w";
## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wimaan.org";
## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;
## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [ '1x' => "$wgResourceBasePath/logo.svg" ];

## UPO means: this is also a user preference option

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;



################## Database
include_once ("config/db_auth.php");

# MySQL specific settings
$wgDBprefix = "";
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary"; # used during installation/update

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];



################## File Uploads
include_once ("config/uploads_cfg.php");

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale. This should ideally be set to an English
## language locale so that the behaviour of C library functions will
## be consistent with typical installations. Use $wgLanguageCode to
## localise the wiki.
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";



################## Secret Key (default source of entropy)
include_once ("config/secret_auth.php");



################## More config

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Enable AJAX usage (CategoryTree needs this)
$wgUseAJAX = true;

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['edit'] = false;



################## License
include_once ("config/license_cfg.php");



################## License
include_once ("config/email_auth.php");



################## Skin
include_once ("config/skin_multi_cfg.php");



################## Extensions
include_once ("config/extension_multi_cfg.php");




################## Debug/Restrict options for emergencies
include_once ("config/danger_cfg.php");

# TODO:
#  Add custom quests for captcha.