<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>

<div class="content">
<h2 class="title"><font color="black">Pinterest Like</font></h2>
<div>To get free points by liking other's pins click on the "like" button, then the pin will be opened with popUp and after liking the pin CLOSE the popUp yourself. The users who don't close manually the popUp, will not receive points.</div>

<iframe width="70%" height="290px"  scrolling="no" name="about" src="/p2.php?p=pt_like" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

