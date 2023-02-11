<?php
#### Uncomment to restrict user editing of wiki (for maintenance/emergencies)
## one of these, or a new one
# $wgReadOnly = ( PHP_SAPI === "cli" ) ? null : "We're upgrading! You'll be able to edit again in a few hours.";
# $wgReadOnly = ( PHP_SAPI === "cli" ) ? null : "We're down for maintenance. You'll be able to contribute again in a few hours.";
# $wgReadOnly = "Due to the ongoing elections, we're restricting edits temporarily.";
## all of these
# $wgIgnoreImageErrors = false;


#### Debugging messages
# $wgShowExceptionDetails = true;
# $wgDevelopmentWarnings = true; error_reporting( -1 ); ini_set( 'display_errors', 1);
$wgDeprecationReleaseLimit = '1.x';
error_reporting(E_ERROR);
