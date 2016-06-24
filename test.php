<?php
$starttime = microtime(true);
define('BASEPATH', true);
include('system/config.php');
if($site['maintenance'] > 0){$site['site_name'] .= ' - '.$lang['b_01']; if($data['admin'] < 1){redirect('maintenance');}}
if(!$is_online && isset($_SERVER['HTTP_REFERER']) && !isset($_COOKIE['PESRefSource'])){
	setcookie("PESRefSource", $db->EscapeString($_SERVER['HTTP_REFERER']), time()+1800);
}
if(isset($_GET['unsubscribe']) && isset($_GET['um'])){
	$uid = $db->EscapeString($_GET['unsubscribe']);
	$um = $db->EscapeString($_GET['um']);
	if($db->QueryGetNumRows("SELECT id FROM `users` WHERE `id`='".$uid."' AND MD5(`email`)='".$um."'") > 0){
		$db->Query("UPDATE `users` SET `newsletter`='0' WHERE `id`='".$uid."' AND MD5(`email`)='".$um."'");
		echo '<center><b style="color:green">You was successfully unsubscribed from newsletters!</b></center>';
		redirect('index.php');
		exit;
	}
}
$errMsg = '';
if(isset($_POST['connect'])) {
	$login = $db->EscapeString($_POST['login']);
	$pass = MD5($_POST['pass']);
	$data = $db->QueryFetchArray("SELECT id,login,banned,activate FROM `users` WHERE (`login`='".$login."' OR `email`='".$login."') AND `pass`='".$pass."'");

	if($data['banned'] > 0){
		$errMsg = '<div class="msg"><div class="error">'.$lang['b_02'].'</div></div>';
		$sql = $db->Query("SELECT id,reason FROM `ban_reasons` WHERE `user`='".$data['id']."'");
		if($db->GetNumRows($sql) > 0){
			$ban = $db->FetchArray($sql);
			if(!empty($ban['reason'])){
				$_SESSION['PES_Banned'] = $data['id'];
				redirect('banned.php?id='.$data['id']);
			}
		}
	}elseif($data['activate'] > 0){
		$errMsg = '<a href="register.php?resend" title="Click here" style="text-decoration:none;color:#a32326"><div class="msg"><div class="error">'.$lang['b_03'].'</div></div></a>';
	}elseif($data['id'] != '') {
		if(isset($_POST['remember'])){
			setcookie('PESAutoLogin', 'ses_user='.$data['login'].'&ses_hash='.$pass, time()+604800, '/');
		}
		$db->Query("UPDATE `users` SET `log_ip`='".VisitorIP()."', `online`=NOW() WHERE `id`='".$data['id']."'");
		$_SESSION['EX_login'] = $data['id'];
		redirect('index.php');
	}else{
	}
}
if(isset($_GET['history'])){
?>
<link rel="stylesheet" type="text/css" href="theme/pes/style.css" />
  $tras = $db->FetchArrayAll($sql);
  if($db->GetNumRows($sql) == 0){
	echo '<tr><td colspan="5">'.$lang['b_250'].'</td></tr>';
  }
  foreach($tras as $tra){
?>	
<?
}else{
	$msg = '';
	if(isset($_POST['submit']) && isset($_POST['pack_id'])){
		$pid = $db->EscapeString($_POST['pack_id']);
		$sql = $db->Query("SELECT id,coins,price FROM `c_pack` WHERE `id`='".$pid."'");
		$pack = $db->FetchArray($sql);
		$price = ($site['c_discount'] > 0 ? number_format($pack['price'] * ((100-$site['c_discount']) / 100), 2) : $pack['price']);
		if($db->GetNumRows($sql) == 0){
		}elseif($data['coins'] < $price){
		}else{
			$db->Query("UPDATE `users` SET `coins`=`coins`-'".$price."', `coins`=`coins`+'".$pack['coins']."' WHERE `id`='".$data['id']."'");
		}
	}
?>
<div style="display:none;" class="content"><?
$sql = $db->Query("SELECT id,coins,price FROM `c_pack` ORDER BY `id` ASC");
$check = $db->GetNumRows($sql);
if($check > 0){
$packs = $db->FetchArrayAll($sql);
foreach($packs as $pack){
?><form type="hidden"  method="POST"><input name="pack_id" value="<?=$pack['id']?>" /><input type="submit" name="submit"  value=" " />
</form>
<?}}else{?>	
<?}?>
</div>
<?}?>