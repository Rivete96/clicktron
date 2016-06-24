<?
define('BASEPATH', true);
require_once('../../config.php');
if(!$is_online){exit;}

function get_likes($url){
	$url = get_data('https://gdata.youtube.com/feeds/api/videos/' . $url . '?v=2&fields=yt:rating&alt=json');
	$entry = json_decode($url); 
	return $entry->{'entry'}->{'yt$rating'}->{'numLikes'};
}

if(isset($_POST['get']) && $_POST['url'] != '' && $_POST['pid'] > 0){
	$pid = $db->EscapeString($_POST['pid']);
	$sit = $db->FetchArray($db->Query("SELECT url FROM `ylike` WHERE `id`='".$pid."'"));
	$key = get_likes($sit['url']);

	if($db->QueryGetNumRows("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='ylike'") == 0){
		$result	= $db->Query("INSERT INTO `module_session` (`user_id`,`page_id`,`ses_key`,`module`,`timestamp`)VALUES('".$data['id']."','".$pid."','".$key."','ylike','".time()."')");
	}else{
		$result	= $db->Query("UPDATE `module_session` SET `ses_key`='".$key."' WHERE `user_id`='".$data['id']."' AND `page_id`='".$pid."' AND `module`='ylike'");
	}
	if($result){
		echo '1';
	}
}elseif(isset($_POST['step']) && $_POST['step'] == "skip" && is_numeric($_POST['sid']) && !empty($data['id'])){
	$uid = $db->EscapeString($_GET['sid']);
	if($db->QueryGetNumRows("SELECT site_id FROM `yliked` WHERE `user_id`='".$data['id']."' AND `site_id`='".$uid."'") == 0){
		$db->Query("INSERT INTO `yliked` (user_id, site_id) VALUES('".$data['id']."', '".$uid."')");
		echo '<div class="msg"><div class="info">'.$lang['ylike_08'].'</div></div>';
	}
}

if(isset($_POST['id'])){
	$uid = $db->EscapeString($_POST['id']);
	$sit = $db->FetchArray($db->Query("SELECT id,user,url,cpc FROM `ylike` WHERE `id`='".$uid."'"));
	$mod_ses = $db->FetchArray($db->Query("SELECT ses_key FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='ylike'"));

	if($mod_ses['ses_key'] != '' && get_likes($sit['url']) > $mod_ses['ses_key']){
		$plused = $db->QueryGetNumRows("SELECT site_id FROM `yliked` WHERE `site_id`='".$uid."' AND `user_id`='".$data['id']."'");

		if($plused < 1 && $sit['cpc'] >= 2) {
			$db->Query("UPDATE `users` SET `coins`=`coins`+'".($sit['cpc']-1)."' WHERE `id`='".$data['id']."'");
			$db->Query("UPDATE `users` SET `coins`=`coins`-'".$sit['cpc']."' WHERE `id`='".$sit['user']."'");
			$db->Query("UPDATE `ylike` SET `clicks`=`clicks`+'1' WHERE `id`='".$uid."'");
			$db->Query("UPDATE `web_stats` SET `value`=`value`+'1' WHERE `module_id`='ylike'");
			$db->Query("INSERT INTO `yliked` (user_id, site_id) VALUES('".$data['id']."', '".$uid."')");
			$db->Query("DELETE FROM `module_session` WHERE `user_id`='".$data['id']."' AND `page_id`='".$sit['id']."' AND `module`='ylike'");

			if($db->QueryGetNumRows("SELECT uid FROM `user_clicks` WHERE `uid`='".$data['id']."' AND `module`='ylike' LIMIT 1") == 0){
				$db->Query("INSERT INTO `user_clicks` (`uid`,`module`,`total_clicks`,`today_clicks`)VALUES('".$data['id']."','ylike','1','1')");
			}else{
				$db->Query("UPDATE `user_clicks` SET `total_clicks`=`total_clicks`+'1', `today_clicks`=`today_clicks`+'1' WHERE `uid`='".$data['id']."' AND `module`='ylike'");
			}
			echo '1';
		}else{
			echo '2';
		}
	}else{
		echo '0';
	}
}
?>