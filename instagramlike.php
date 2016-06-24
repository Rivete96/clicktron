<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>

<div class="content">
<h2 class="title"><font color="black">Instagram Like</font></h2>
<div>To get free points by liking other's Instagram Photos click on the ''like'' button, then the photo will be opened with popUp and after like the photo CLOSE the popUp yourself. The users who don't close manually the popUp, will not receive points.</div>
<iframe width="70%" height="290px"  scrolling="no" name="about" src="/p2.php?p=in_like" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

