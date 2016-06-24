<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>

<div class="content">
<h2 class="title"><font color="black">Pinterest Repins</font></h2>
<div>To get free points by repinning other's pins click on the "repin" button, then the pin will be opened with popUp and after repinning the pin CLOSE the popUp yourself. The users who don't close manually the popUp, will not receive points.</div>

<iframe width="70%" height="290px"  scrolling="no" name="about" src="/p2.php?p=pt_repin" frameborder=0 ALLOWTRANSPARENCY="true"></iframe>
</div>
<?include('footer.php');?>

