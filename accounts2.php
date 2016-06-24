<?php
$starttime = microtime(true);
define('BASEPATH', true);
include('system/config.php');

if(isset($_GET['p'])){
	$module = $_GET['p'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title><?=$site['site_name']?></title>
<meta http-equiv="Content-type" content="text/html; charset=<?=$conf['lang_charset']?>" />
<meta name="description" content="<?=$site['site_description']?>" />
<meta name="keywords" content="free twitter followers, free facebook likes, twitter followers, facebook likes, get free followers, follower exchange, social media exchange, stumbleupon followers, social exchange system, digg exchange, free youtube views, youtube views" />
<meta name="author" content="The Mafia (c) BHF" />
<meta name="version" content="<?=$config['version']?>" />
<link rel="stylesheet" href="theme/pes/style2.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<?if($is_online){?><script type="text/javascript"> var auto_refresh = setInterval( function() { $('#c_coins').load('system/uCoins.php'); }, 15000); </script><?}?>
</head>
<body>

<style>

.header {
	width: 100%;
	height: 100%;
	background: none;
}

.header_block {
	width: 1003px;
	margin: 0 auto;
	display: inline-block;
	*display: inline;
	zoom: 1;
	padding-bottom: 35px;
	background: url(/img/head_map.png) no-repeat 190px -8px;
}

.logo {
	float: left;
	padding: 5px 0 0 0px;
}
.header_right {
	float: right;
	padding-top: 30px;
	padding-right: 14px;
	color: #333;
	font-size: 17px;
	text-align: right;
	line-height: 11px;
	font-weight: bold;
}

.head-welcome {
	
}

.flr {
	float: right;
}

.pleft20 {
	padding-left: 20px;
}

.pleft10 {
	padding-left: 10px;
}

.points_count {
	color: #333;
	font-size: 34px;
}

.header_right a {
	color: #333;
	font-size: 20px;
}
.logout {
	/*background:url(/img/1322634486_lock_unlock.png) no-repeat left center;*/
	background: url(/img/logout_icon.png) no-repeat left center;
	padding: 12px 0 10px 30px;
}

.profile {
	background: url(/img/profile_icon.png) no-repeat left center;
	padding: 12px 0 10px 43px;
}

.my_referals {
	background: url(/img/my_referals.png) no-repeat left center;
	padding: 14px 0 10px 40px;
}

.reg_slider {
	width: 1003px;
	margin: 20px auto;
	display: inline-block;
}
</style>


<div class="content">
<? 
if(isset($_GET['a'])){
	$account = $_GET['a'];
	if(file_exists('system/modules/'.$account.'/config2.php')){
		include('system/modules/'.$account.'/config2.php');
	}else{
		redirect('accounts.php');
		exit;
	}
}else{?>
<div class="infobox"><?=hook_filter('account_menu',"")?></div>
<?}?>
</div>	
