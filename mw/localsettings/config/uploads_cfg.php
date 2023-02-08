<?php
## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

#### File Uploads configuration
$wgFileExtensions = array('png', 'gif', 'jpg', 'jpeg', 'svg', 'tiff', 'odg', 'bmp', 'ps', 'docx', 'doc', 'odt', 'ods', 'odp', 'xlsx', 'pptx', 'pdf', 'txt', 'tex');

#### SVG Support
$wgAllowTitlesInSVG = true;
$wgSVGConverter = 'rsvg';