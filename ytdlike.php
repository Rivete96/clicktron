<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>
<div class="content">
<h2 class="title"><font color="black">Youtube Dislikes</font></h2>
<pre ALIGN=Left>To get free points by disliking other's YouTube Videos click 
on the "Dislike" button, then the video will be opened with 
popUp and after disliking the video CLOSE the popUp yourself.</pre>
<iframe width="70%" height="250px"  scrolling="no" name="about" src="/p2.php?p=ydlike" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

