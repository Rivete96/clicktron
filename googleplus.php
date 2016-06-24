<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>

<div class="content">
<h2 class="title"><font color="black">Google Plus</font></h2>

<iframe width="70%" height="500px"  scrolling="no" name="about" src="/p2.php?p=google" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

