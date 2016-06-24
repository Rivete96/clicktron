<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>
<div class="content">
<h2 class="title"><font color="black">Youtube Likes</font></h2>
<pre ALIGN=Left><font color="black">To get free points by liking other's YouTube Videos click 
on the "like" button, then the video will be opened with 
popUp and after liking the video CLOSE the popUp yourself.</font></pre>
<iframe width="70%" height="240px"  scrolling="no" name="about" src="/p2.php?p=ylike" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

