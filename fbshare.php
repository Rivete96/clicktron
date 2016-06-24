<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>

<div class="content">
<h2 class="title"><font color="black">Facebook Share</font></h2>
<div>To get free points by sharing other's WebSites click on the "Share" button, then the page will be opened with popUp and after sharing the website the popUp will be closed automatically.</div>
<iframe width="70%" height="290px"  scrolling="no" name="about" src="/p2.php?p=fb_share" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

