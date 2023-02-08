<?php
# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtension( 'ExtensionName' );
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension( 'Cite' );
#### ConfirmEdit (extension - for captcha)
wfLoadExtension( 'ConfirmEdit' );
include_once ("extensions/confirmedit.php");
wfLoadExtension( 'ImageMap' );
wfLoadExtension( 'SpamBlacklist' );
wfLoadExtension( 'TitleBlacklist' );
wfLoadExtension( 'VisualEditor' );

#### Moderation (extension)
wfLoadExtension ( 'Moderation' );
include_once ("extensions/moderation.php");
#### Google Login (extension - to enable authenticating with Google account)
wfLoadExtension ( 'GoogleLogin' );
include_once ("extensions/googlelogin_auth.php");
#### UserMerge (extension - for deleting users)
wfLoadExtension( 'UserMerge' );
include_once ("extensions/usermerge.php");
#### CreatePageUw (extension - for easy page creation)
wfLoadExtension( 'CreatePageUw' );
include_once ("extensions/createpageuw.php");
#### HitCounters (extension - to count page hits)
wfLoadExtension( 'HitCounters' );
#### AJAXPoll (extension - for public polls)
wfLoadExtension( 'AJAXPoll' );
#### WikiSEO (extension - for SEO)
wfLoadExtension( 'WikiSEO' );
#### CategoryTree extension (for AJAX based Category Tree browsing)
wfLoadExtension( 'CategoryTree' );
#### Echo extension (for notifications)
wfLoadExtension( 'Echo' );
#### TemplateStyles (extension - for ability to use CSS to style templates)
wfLoadExtension( 'TemplateStyles' );
#### Popups (extension - for popups), and dependencies (TextExtracts, PageImages)
wfLoadExtension( 'Popups' );
wfLoadExtension( 'TextExtracts' );
wfLoadExtension( 'PageImages' );
#### PrivateDomains (extension - for restricting access to Insti Mail users only, for people who don't use GoogleLogin)
wfLoadExtension( 'PrivateDomains' );


#### AbuseFilter (extension - to scan for phone numbers in an edit and similar jobs)
# wfLoadExtension( 'AbuseFilter' );
# disabled until configured

#### Report (extension - for reporting pages)
# wfLoadExtension( 'Report' );
# disabled until configured - need to restrict to pages instead of edits, and only for Insti Culture


#### Page Forms extension (for creating forms to edit widgets, etc)
# wfLoadExtension( 'PageForms' );
# $wgGroupPermissions['user']['createclass'] = false;
# $wgGroupPermissions['sysop']['createclass'] = true;
# $wgGroupPermissions['user']['multipageedit'] = false;
# $wgGroupPermissions['sysop']['multipageedit'] = true;


#### SlackNotifications (extension - for edit notifs on Slack)
# wfLoadExtension( 'SlackNotifications' );
# include_once ("extensions/slacknotifications_auth.php");