<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>
<div class="content">
<h2 class="title"><font color="black">Instagram Followers</font></h2>
<div>Get free points by following other's instagram accounts.</div>
<iframe width="70%" height="290px"  scrolling="no" name="about" src="/p2.php?p=instagram" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

