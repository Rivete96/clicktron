<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>

<div class="content">
<h2 class="title"><font color="black">Facebook Followers</font></h2>
<div>To get free points by following other's Facebook Profiles click on the "Follow" button, then the profile will be opened with popUp and after following to profile CLOSE the popUp yourself. The users who don't close manually the popUp, will not receive points.</div>

<iframe width="70%" height="270px"  scrolling="no" name="about" src="/p2.php?p=fb_subscribe" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

