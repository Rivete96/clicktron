<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
$total_clicks = $db->QueryFetchArray("SELECT SUM(`total_clicks`) AS `clicks` FROM `user_clicks` WHERE `uid`='".$data['id']."'");
$refs = $db->GetNumRows($db->Query("SELECT id FROM `users` WHERE `ref`='".$data['id']."'"));
$today_clicks = $db->QueryFetchArray("SELECT SUM(`today_clicks`) AS `clicks` FROM `user_clicks` WHERE `uid`='".$data['id']."'");
?>
<div class="content"><h2 class="title">My Profile</h2>
<p align=left >Username:  <?=$data['login']?></p>
<p align=left >Email:  <?=$data['email']?></p>
<p align=left >Country: <?=($data['country'] == '0' ? $lang['b_205'] : get_country($data['country']))?></p>
<p align=left >Your have:  <?=number_format($data['coins']).' '.$lang['b_156']?></p>
<p align=left >Your have: <?=number_format($total_clicks['clicks'])?> clicks</p>
<p align=left >Today:  <?=number_format($today_clicks['clicks'])?> clicks</p>
<p align=left >My Referrals:  <?=$refs?></p>
<p align=left >You have:  <?=$data['account_balance']?>$</p>
<p align=left >Gender: <?=get_gender($data['sex'], $lang['b_203'], $lang['b_204'], $lang['b_205'])?> </p>
<p align=left >Membership: <?=($data['premium'] > 0 ? $lang['b_194'] : $lang['b_193'])?></p>
<p align=left >Register IP:  <?=$data['IP']?></p>
<p align=left >Last Login IP:  <?=$data['log_ip']?></p>
<p align=left >Signup Date:  <?=$data['signup']?></p>
<p align=left ><?=($data['admin'] > 0 ? '<a href="admin-panel">You are Admin:<b> Admin Panel</b></a>' : '')?></p>
<center><a href="/edit_acc.php" class="single_like_button1 btn3-wrap" >
						                    <div class="btn3">Change</div></a>

<a href="/vip.php" class="single_like_button1 btn3-wrap" >
						                    <div class="btn3">VIP</div></a>
											<a href="/transfer.php" class="single_like_button1 btn3-wrap" >
						                    <div  class="btn3">Transfer Coins</div></a>
											<a href="coupons.php" class="single_like_button1 btn3-wrap" >
						                    <div class="btn3">Coupon</div></a></center>
</div>
<?include('blog1.php');?>
<?include('footer.php');?>
