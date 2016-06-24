<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}

$msg = '';
if(isset($_GET['success'])){
	$msg = '<div class="msg"><div class="success">Thank you for your purchase!</div></div>';
}elseif(isset($_GET['cancel'])){
	$msg = '<div class="msg"><div class="error">Your transaction has been canceled!</div></div>';
}
?>
<div class="content"><h2 class="title">Cash Out</h2>
<?
if(isset($_GET['convert']) && $site['convert_enabled'] == 1){
	$refs = $db->QueryGetNumRows("SELECT id FROM `coins_to_cash` WHERE `user`='".$data['id']."'");
	if(isset($_POST['submit'])){
		$coins = $db->EscapeString($_POST['coins']);

		if(!is_numeric($coins)){
			$msg = '<div class="msg"><div class="error">'.$lang['b_253'].'</div></div>';
		}elseif($data['coins'] < $coins){
			$msg = '<div class="msg"><div class="error">'.$lang['b_146'].'</div></div>';
		}elseif($coins < $site['min_convert']){
			$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_265'], array('-MIN-' => $site['min_convert'])).'</div></div>';
		}else{
			$cash = round((1/$site['convert_rate'])*$coins, 2);
			$db->Query("UPDATE `users` SET `coins`=`coins`-'".$coins."', `account_balance`=`account_balance`+'".$cash."' WHERE `id`='".$data['id']."'");
			$db->Query("INSERT INTO `coins_to_cash` (user, coins, cash, conv_rate, date) VALUES('".$data['id']."', '".$coins."', '".$cash."', '".$site['convert_rate']."', '".time()."')");
			$msg = '<div class="msg"><div class="success">'.lang_rep($lang['b_266'], array('-NUM-' => $coins, '-CASH-' => get_currency_symbol($site['currency_code']).' '.$cash)).'</div></div>';
		}
	}
	echo $msg;
?>
		<div class="infobox" style="font-size: 27px;width:250px;margin:10px auto;display:inline-block"><b>Your balance :<span style="font-size: 27px;font-weight:700;color:green"><?=get_currency_symbol($site['currency_code'])?> <?=$data['account_balance']?></span></b></div>
<div class="infobox t-left">
<center>
<style>
.btn2 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 19px;
font-weight: normal;
float: left;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
</style>
<a href="cashout.php?convert" class="single_like_button1">
						                    <span></span><div class="btn2">1) Coins to Money</div></a><span></span>
  <p></p>
<a href="cashout.php?withdraw" class="single_like_button1">
						                    <span></span><style>
.btn4 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 19px;
font-weight: normal;
float: right;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
#hides {
color: transparent;
}
</style><div align="right" class="btn4">2) Withdraw Money</div></a></center>
<pre id="hides">-
-
-
</pre>
<script type="text/javascript">
	function get_amount(value){
		if(value > 0)
		{
			var amount = Math.round((<?=(1/$site['convert_rate'])?>*value)*100)/100;
			$('#amount-final').html('<?=$lang['b_269']?> <b><?=get_currency_symbol($site['currency_code'])?> '+ amount +'</b>');
		}
	}
</script>
<form method="post">
    <p>
		<label><?=$lang['b_267']?></label><br/>
<p></p>
		<input class="text big" type="text" value="<?=$site['convert_rate']?>" name="coins" oninput="get_amount(this.value)" maxlength="7" />
	</p>
	<p>
		<div id="amount-final"><?=$lang['b_269']?> <b><?=get_currency_symbol($site['currency_code'])?> 1.00</b></div>
	</p>
    <p>
		<input type="submit" class="gbut" value="<?=$lang['b_58']?>" name="submit" />
	</p>
</form>
</div>
<pre id="hides">-
-
-
-
-
_
</pre>

<h2 class="title" style="margin-top:20px"><?=$lang['b_257']?></h2>
	<table class="table">
		<thead>
			<tr>
				<td>#</td>
				<td><?=$lang['b_103']?></td>
				<td><?=$lang['b_42']?></td>
				<td><?=$lang['b_106']?></td>
				<td><?=$lang['b_75']?></td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>#</td>
				<td><?=$lang['b_103']?></td>
				<td><?=$lang['b_42']?></td>
				<td><?=$lang['b_106']?></td>
				<td><?=$lang['b_75']?></td>
			</tr>
		</tfoot>
		<tbody>
<?
  $sql = $db->Query("SELECT id,coins,cash,date FROM `coins_to_cash` WHERE `user`='".$data['id']."' ORDER BY `date` DESC LIMIT 10");
  $num = $db->GetNumRows($sql);
  if($num == 0){ echo '<tr><td colspan="6" align="center"><b>'.$lang['b_250'].'</b></td><tr>';}else{
  $trans = $db->FetchArrayAll($sql);
  foreach($trans as $tran){
?>	
			<tr>
				<td><?=$tran['id']?></td>
				<td><?=$tran['cash'].' '.get_currency_symbol($site['currency_code'])?></td>
				<td><?=$tran['coins']?></td>
				<td><?=date('Y-m-d h:i',$tran['date'])?></td>
				<td><font color="green"><b><?=$lang['b_259']?></b></font></td>
			</tr><?}}?>
		</tbody>
	</table>
<?
}elseif(isset($_GET['withdraw']) && $site['allow_withdraw'] == 1){
	$refs = $db->QueryGetNumRows("SELECT id FROM `requests` WHERE `user`='".$data['id']."' AND `gateway`!='accb'");
	
	if(isset($_POST['submit'])){
		$cash = $db->EscapeString($_POST['cash']);
		$pemail = $db->EscapeString($_POST['email']);
		$gateway = $db->EscapeString($_POST['gateway']);

		if(!is_numeric($cash) || $cash < $site['pay_min']){
			$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_98'], array('-MIN-' => $site['pay_min'])).'</div></div>';
		}elseif(time()-(86400*$site['aff_reg_days']) < strtotime($data['signup'])){
			$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_243'], array('-DAYS-' => $site['aff_reg_days'])).'</div></div>';
		}elseif($_POST['cash'] > $data['account_balance']){
			$msg = '<div class="msg"><div class="error">'.$lang['b_99'].'</div></div>';
		}elseif(!isEmail($_POST['email'])){
			$msg = '<div class="error">'.$lang['b_100'].'</div>';
		}else{
			$db->Query("INSERT INTO `requests` (user, paypal, amount, date, gateway) VALUES('".$data['id']."', '".$pemail."', '".$cash."', NOW(), '".$gateway."')");
			$db->Query("UPDATE `users` SET `account_balance`=`account_balance`-'".$cash."' WHERE `id`='".$data['id']."'");			
			$msg = '<div class="msg"><div class="success">'.$lang['b_101'].'</div></div>';
		}
	}
?>
	<?=$msg?>
			<div class="infobox" style="font-size: 27px;width:250px;margin:10px auto;display:inline-block"><b>Your balance :<span style="font-size: 27px;font-weight:700;color:green"><?=get_currency_symbol($site['currency_code'])?> <?=$data['account_balance']?></span></b></div>
<div class="infobox t-left">
<center>
<style>
.btn2 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 19px;
font-weight: normal;
float: left;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
</style>
<a href="cashout.php?convert" class="single_like_button1">
						                    <span></span><div class="btn2">1) Coins to Money</div></a><span></span>
  <p></p>
<a href="cashout.php?withdraw" class="single_like_button1">
						                    <span></span><style>
.btn4 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 19px;
font-weight: normal;
float: right;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
#hides {
color: transparent;
}
</style><div align="right" class="btn4">2) Withdraw Money</div></a></center>
<pre id="hides">-
-
-
</pre>
<pre>
Minimum Payout System :

You can request a payout payment when you reach :

$10.00 for PayPal.

$10.00 for Payza.
</pre>
<form method="post">
    <p>
		<label><?=$lang['b_103']?> (<?=get_currency_symbol($site['currency_code'])?>)</label><br/>
		<p></p>
		<input class="text big" type="text" value="<?=$site['pay_min']?>" name="cash" maxlength="7" />
	</p>
	<p>
		<label><?=$lang['b_226']?></label><br/>
		<p></p>
		<select name="gateway" id="gateway" onchange="setSelect()" style="padding:4px;width:226px">
			<?if($site['paypal_status'] == 1){?><option value="paypal">Paypal</option><?}?>
			<?if($site['payza_status'] == 1){?><option value="payza">Payza</option><?}?>
		</select>
	</p>
	<p>
		<label><?=$lang['b_104']?></label><br/>
		<p></p>
		<input class="text big" type="text" value="<?=$data['email']?>" name="email" />
	</p>
    <p>
		<input type="submit" class="gbut" value="<?=$lang['b_58']?>" name="submit" />
	</p>
</form>
</div>

<div class="infobox t-left"><?=lang_rep($lang['b_102'], array('-SUM-' => $site['pay_min']))?></div>
<pre id="hides">-
-
-
-
-
_
</pre>
<h2 class="title" style="margin-top:20px"><?=$lang['b_257']?></h2>
	<table class="table">
		<thead>
			<tr>
				<td width="20">#</td>
				<td><?=$lang['b_103']?></td>
				<td><?=$lang['b_104']?></td>
				<td><?=$lang['b_258']?></td>
				<td><?=$lang['b_106']?></td>
				<td><?=$lang['b_75']?></td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>#</td>
				<td><?=$lang['b_103']?></td>
				<td><?=$lang['b_105']?></td>
				<td><?=$lang['b_258']?></td>
				<td><?=$lang['b_106']?></td>
				<td><?=$lang['b_75']?></td>
			</tr>
		</tfoot>
		<tbody>
<?
  $sql = $db->Query("SELECT amount,paypal,date,paid,gateway,reason FROM `requests` WHERE `user`='".$data['id']."' AND `gateway`!='accb' ORDER BY `date` DESC LIMIT 10");
  $num = $db->GetNumRows($sql);
  if($num == 0){ echo '<tr><td colspan="6" align="center"><b>'.$lang['b_250'].'</b></td><tr>';}else{
  for($j=1; $user = $db->FetchArray($sql); $j++)
{
?>	
			<tr>
				<td><?=$j;?></td>
				<td><?=$user['amount'].' '.get_currency_symbol($site['currency_code'])?></td>
				<td><?=(!empty($user['paypal']) ? $user['paypal'] : 'N/A')?></td>
				<td><?=ucfirst($user['gateway'])?></td>
				<td><?=$user['date']?></td>
				<td><?if($user['paid'] == 0){?><font color="orange"><?=$lang['b_107']?><?}elseif($user['paid'] == 2){?><font color="red" title="<?=$user['reason']?>"><?=$lang['b_108']?><?}else{?><font color="green"><?=$lang['b_109']?><?}?></font></td>
			</tr><?}}?>
		</tbody>
	</table>
<?
}else{
	$refs = $db->QueryGetNumRows("SELECT id FROM `transactions` WHERE `user_id`='".$data['id']."'");
	if(isset($_POST['submit'])){
		$cash = $db->EscapeString($_POST['cash']);
		$gateway = $db->EscapeString($_POST['gateway']);
		
		if(!is_numeric($cash)){
			$msg = '<div class="msg"><div class="error">'.$lang['b_253'].'</div></div>';
		}elseif($cash < 1){
			$msg = '<div class="msg"><div class="error">'.lang_rep($lang['b_254'], array('-MIN-' => get_currency_symbol($site['currency_code']).' 1.00')).'</div></div>';
		}else{
			$redurl = $site['site_url'].'/system/payments/'.$gateway.'/add_cash.php?cash='.$cash;
			redirect($redurl);
		}
	}
?>
<div class="infobox" style="font-size: 27px;width:250px;margin:10px auto;display:inline-block"><b>Your balance :<span style="font-size: 27px;font-weight:700;color:green"><?=get_currency_symbol($site['currency_code'])?> <?=$data['account_balance']?></span></b></div>
<div class="infobox t-left">
<center>
<style>
.btn2 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 19px;
font-weight: normal;
float: left;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
</style>
<a href="cashout.php?convert" class="single_like_button1">
						                    <span></span><div class="btn2">1) Coins to Money</div></a><span></span>
  <p></p>
<a href="cashout.php?withdraw" class="single_like_button1">
						                    <span></span><style>
.btn4 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 19px;
font-weight: normal;
float: right;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
#hides {
color: transparent;
}
</style><div align="right" class="btn4">2) Withdraw money</div></a></center>
<pre id="hides">-
-
-
</pre>
<script type="text/javascript">
	function get_amount(value){
		if(value > 0)
		{
			var amount = Math.round((<?=(1/$site['convert_rate'])?>*value)*100)/100;
			$('#amount-final').html('<?=$lang['b_269']?> <b><?=get_currency_symbol($site['currency_code'])?> '+ amount +'</b>');
		}
	}
</script>
<form method="post">
    <p>
		<label><?=$lang['b_267']?></label><br/>
		<input class="text big" type="text" value="<?=$site['convert_rate']?>" name="coins" oninput="get_amount(this.value)" maxlength="7" />
	</p>
	<p>
		<div id="amount-final"><?=$lang['b_269']?> <b><?=get_currency_symbol($site['currency_code'])?> 1.00</b></div>
	</p>
    <p>
		<input type="submit" class="gbut" value="<?=$lang['b_58']?>" name="submit" />
	</p>
</form>
</div>
<pre id="hides">-
-
-
-
-
_
</pre>
<h2 class="title" style="margin-top:20px"><?=$lang['b_257']?></h2>
	<table class="table">
		<thead>
			<tr>
				<td>#</td>
				<td><?=$lang['b_103']?></td>
				<td><?=$lang['b_42']?></td>
				<td><?=$lang['b_106']?></td>
				<td><?=$lang['b_75']?></td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>#</td>
				<td><?=$lang['b_103']?></td>
				<td><?=$lang['b_42']?></td>
				<td><?=$lang['b_106']?></td>
				<td><?=$lang['b_75']?></td>
			</tr>
		</tfoot>
		<tbody>
<?
  $sql = $db->Query("SELECT id,coins,cash,date FROM `coins_to_cash` WHERE `user`='".$data['id']."' ORDER BY `date` DESC LIMIT 10");
  $num = $db->GetNumRows($sql);
  if($num == 0){ echo '<tr><td colspan="6" align="center"><b>'.$lang['b_250'].'</b></td><tr>';}else{
  $trans = $db->FetchArrayAll($sql);
  foreach($trans as $tran){
?>	
			<tr>
				<td><?=$tran['id']?></td>
				<td><?=$tran['cash'].' '.get_currency_symbol($site['currency_code'])?></td>
				<td><?=$tran['coins']?></td>
				<td><?=date('Y-m-d h:i',$tran['date'])?></td>
				<td><font color="green"><b><?=$lang['b_259']?></b></font></td>
			</tr><?}}?>
		</tbody>
	</table>
<?}?>
</div>
<?include('footer.php');?>