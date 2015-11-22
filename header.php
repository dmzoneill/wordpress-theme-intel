<?php

include( "inc/ldapuser.class.php" );
include( "inc/ldap.class.php" );
include( "inc/common.class.php" );

$common = Common::getInstance();

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel='stylesheet' id='__EPYT__style-css'  href='http://shannon.intel.com/wp-content/plugins/youtube-embed-plus/styles/ytprefs.min.css?ver=4.3.1' type='text/css' media='all' />
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js'></script>
<link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css' type='text/css' media='all' />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header_container">
    <div id="header">       
		<table id='menutoptable'>
			<tr>
				<td id='menutopcol1'>
					<img src='<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/intel/images/intel-header-blue.png'>
				</td>
				<td id='menutopcol2'>				
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' class='white' style='margin-right:10px;margin-left:10px'>Shannon</a> | 
          <a href='http://www.intel.ie' class='white' style='margin-right:10px;margin-left:10px'>Ireland</a> | 
          <a href='https://employeeportal.intel.com' class='white' style='margin-right:10px;margin-left:10px'>Employee Portal</a>
				</td>
				<td id='menutopcol3'>
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>evacation/default.asp' target='_blank'><img style="height:50px;vertical-align:middle;margin-right:15px;border:0px;" src='<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/intel/images/calendar-icon.png'></a> 
          <a class="white" href="https://ease.intel.com/es/Phonebook/EditEmployeeRec.aspx"><img style="height:50px;vertical-align:middle;margin-right:15px;" src='<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/intel/<?php print $common->getuserimage( $common->current_user->samaccountname );?>'></a>
          <a class="white" href="https://ease.intel.com/es/Phonebook/EditEmployeeRec.aspx"><?php print $common->current_user->displayname; ?></a>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>			
		</table>
    </div>
</div>

<div id="container">
  <div id="content">
  
    <div id="welcomeDiv">
      <div id="welcomeTextContainer">
        <h2 class='title'><?php bloginfo( 'name' ); ?></h2>
        <h4 class="description"><?php bloginfo( 'description' ); ?></h4>
      </div>
    </div>
	
		<div id="pageContainer">
			<div id="pageContent">
        <div id="left">
          <?php get_sidebar(); ?>
        </div>
        <div id="right">	