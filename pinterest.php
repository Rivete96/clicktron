<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>
<div class="content">
<h2 class="title"><font color="black">Pinterest Followers</font></h2>
<div>To get free points by follow other's Pinterest Accounts click on the "follow" button, then the account will be opened with popUp and after following the account CLOSE the popUp yourself. The users who don't close manually the popUp, will not receive points.</div>

<iframe width="70%" height="290px"  scrolling="no" name="about" src="/p2.php?p=pinterest" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

