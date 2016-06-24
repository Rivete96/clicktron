<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>

<div class="content">
<h2 class="title"><font color="black">SoundCloud Follow</font></h2>
<pre ALIGN=Left>
To get free points by follow other's SoundCloud Accounts 
click on the "follow" button, then the account will be
opened with popUp and after following the account CLOSE
 the popUp yourself.</pre>
<iframe width="70%" height="256px"  scrolling="no" name="about" src="/p2.php?p=soundcloud" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

