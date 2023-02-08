<?php
#### Email

# Configure these settings according to the page here: https://www.mediawiki.org/wiki/Manual:$wgSMTP/Gmail
# Password: generate an app-password, enable 2FA for that.
$wgSMTP = [
	'host'     => 'ssl://smtp.gmail.com',
	'IDHost'   => 'wimaan.org',
	'port'     => 465,
	'auth'	   => true,
	'username' => 'wimaan@smail.iitm.ac.in',
	'password' => ''
];
$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO
$wgEmergencyContact = "wimaan.iitm@gmail.com";
$wgPasswordSender = "wimaan@smail.iitm.ac.in";
# Requiring a confirmed email for actions and signing up
$wgEmailConfirmToEdit = true;