<?php

include( "../inc/ldapuser.class.php" );
include( "../inc/ldap.class.php" );
include( "../inc/common.class.php" );

$common = Common::getInstance();

$user = isset( $_GET[ 'user' ] ) ? $_GET[ 'user' ] : $common->current_user->samaccountname;

$name = "../" . $common->getuserimage( $user );
$fp = fopen($name, 'rb');

header( "Content-Type: image/jpeg" );
header( "Content-Length: " . filesize( $name ) );

// dump the picture and stop the script
fpassthru($fp);
exit;