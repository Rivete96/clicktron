<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
$total_clicks = $db->QueryFetchArray("SELECT SUM(`total_clicks`) AS `clicks` FROM `user_clicks` WHERE `uid`='".$data['id']."'");
$refs = $db->GetNumRows($db->Query("SELECT id FROM `users` WHERE `ref`='".$data['id']."'"));
$today_clicks = $db->QueryFetchArray("SELECT SUM(`today_clicks`) AS `clicks` FROM `user_clicks` WHERE `uid`='".$data['id']."'");
?>
<div class="content"><h2 class="title"><center>We're sorry...</center></h2>
<h3>The page you are looking for cannot be found.</h3>
<h4>You will back in 5 seconds in home</h4>
<h4>or</h4>
<a class="gbut" href="index.php">Return to the homepage</a>
</div>
<meta http-equiv="refresh" content="5;url=http://localhost//clicktron/">
<?include('footer.php');?>
