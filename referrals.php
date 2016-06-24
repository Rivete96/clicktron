<?php
include('header.php');
if(!$is_online || $site['refsys'] != 1){
	redirect('index.php');
	exit;
}
$refs = $db->GetNumRows($db->Query("SELECT id FROM `users` WHERE `ref`='".$data['id']."'"));
?>
<div class="content"><h2 class="title"><?=$lang['b_121']?></h2>
						<b style="font-size:13px"><?=$lang['b_113']?>:</b>
							<ul style="font-size:12px;list-style-type:disc">
								<div style="margin-left:20px;"><?=lang_rep($lang['b_114'], array('-NUM-' => $site['ref_coins']))?></div><?if($site['paysys'] == 1){?>
								<div style="margin-left:20px;"><?=lang_rep($lang['b_115'], array('-SUM-' => $site['ref_cash']))?></div>
								<div style="margin-left:20px;"><?=lang_rep($lang['b_116'], array('-NUM-' => $site['ref_sale']))?></div><?}?>
								<div style="margin-left:20px;">To receive commission, your referral must complete at least 50 exchanges at our website</div>
                <center><input type="text" value="<?=$site['site_url']?>/?ref=<?=$data['id']?>" onclick="this.select()" style="font-size:11px;padding:4px;width:270px;margin:0 auto;" readonly="true" /></center>

							</ul>

	<div class="infobox" style="width:250px;margin:10px auto;display:inline-block;font-size"><b><?=$lang['b_119']?>: <span style="font-weight:600;color:green;font-size:50px"><?=$refs?></span></b></div>
	<?if($site['paysys'] == 1){?><div class="infobox" style="width:250px;margin:10px auto;display:inline-block"><b><?=$lang['b_255']?>: <span style="font-weight:600;color:green;font-size:40px"><?=$data['account_balance']?> $</span></b></div><?}?>
	<br><hr><br>
							<table class="table">
                                <thead>
                                    <tr>
                                        <td><?=$lang['b_122']?></td>
                                        <td><?=$lang['b_106']?></td>
										<td><?=$lang['b_244']?></td>
                                    </tr>
                                </thead>
								<tfoot>
                                    <tr>
                                        <td><?=$lang['b_122']?></td>
                                        <td><?=$lang['b_106']?></td>
										<td><?=$lang['b_244']?></td>
                                    </tr>
                                </tfoot>
                                <tbody>
<?
  $sql = $db->Query("SELECT id FROM `users` WHERE `ref`='".$data['id']."'");
  $num = $db->GetNumRows($sql);
  $pages = floor($num/20+1);
  $begin = ($_GET['p'] >= 0) ? $_GET['p']*20 : 0;
  $sql = $db->Query("SELECT id,login,signup,ref_paid FROM `users` WHERE `ref`='".$data['id']."' ORDER BY `signup` DESC LIMIT ".$begin.",20");
  $users = $db->FetchArrayAll($sql);
  if($db->GetNumRows($sql) == 0){
	echo '<tr><td colspan="4">'.$lang['b_250'].'</td></tr>';
  }
  foreach($users as $user){
?>	
                                    <tr>
                                        <td><?=$user['login']?></td>
                                        <td><?=$user['signup']?></td>
										<td><?=($user['ref_paid'] == 1 ? $lang['b_124'] : $lang['b_125'])?></td>
                                    </tr>
<?}?>
                                </tbody>
                            </table>
							<?if($pages > 1){?>
<div class="infobox">

    <div style="float:left;">
<?
$prev = $_GET['p']-1;
$next = $_GET['p']+1;
if($num >= 0) {
	if($begin/20 == 0) {
		echo '<img src="theme/pes/images/black_arrow_left.png" />';
	}else{
		echo '<a href="?p='.($begin/20-1).'"><img src="theme/pes/images/black_arrow_left.png" /></a>';
	}
	
	$bg1 = $begin+1;
	$bg2 = ($begin+20 >= $num ? $num : $begin+20);
	echo "&nbsp;&nbsp; {$bg1} - {$bg2} &nbsp;&nbsp;";
	
	if($begin+20 >= $num) {
		echo '<img src="theme/pes/images/black_arrow_right.png" />';
	}else{
		echo '<a href="?p='.($begin/20+1).'"><img src="theme/pes/images/black_arrow_right.png" /></a>';
	}
}
?>
	</div>
	<div style="float:right;">
		<b><?=$bg1?> - <?=$bg2?></b> <?=lang_rep($lang['b_126'], array('-NUM-' => $num))?>
	</div>

	<div style="display:block; clear:both;"></div>

</div>


<?}?>
				<table width="100%" border="0" cellpadding="3" cellspacing="1">
					<tr>
						<td valign="top" align="center">
                                       <p><font size="5">Banner 1</font></p>
							<img src="<?=$site['site_url']?>/promo/banner.png" border="0" />
						</td>
					</tr>
					<tr>    
						<td valign="top" align="center">
							<b><?=$lang['b_118']?></b><br>
							<textarea class="textarea" style="width:550px;height:60px" onclick="this.select()" readonly="true"><a href="<?=$site['site_url']?>/?ref=<?=$data['id']?>" target="_blank"><img src="<?=$site['site_url']?>/promo/banner.png" alt="<?=$site['site_name']?>" border="0" /></a></textarea>
						</td>
					</tr>
					<tr>    
						<td valign="top" align="center">
							<b>BB Code</b><br>
							<textarea class="textarea" style="width:550px;height:30px" onclick="this.select()" readonly="true">[url=<?=$site['site_url']?>/?ref=<?=$data['id']?>][img]<?=$site['site_url']?>/promo/banner.png[/img][/url]</textarea>                        
						</td>
					<tr>
						<td valign="top" align="center">
                                       <p><font size="5">Banner 2</font></p>
							<img src="<?=$site['site_url']?>/promo/banner2.gif" border="0" />
						</td>
					</tr>
					<tr>    
						<td valign="top" align="center">
							<b><?=$lang['b_118']?></b><br>
							<textarea class="textarea" style="width:550px;height:60px" onclick="this.select()" readonly="true"><a href="<?=$site['site_url']?>/?ref=<?=$data['id']?>" target="_blank"><img src="<?=$site['site_url']?>/promo/banner2.gif" alt="<?=$site['site_name']?>" border="0" /></a></textarea>
						</td>
					</tr>
					<tr>    
						<td valign="top" align="center">
							<b>BB Code</b><br>
							<textarea class="textarea" style="width:550px;height:30px" onclick="this.select()" readonly="true">[url=<?=$site['site_url']?>/?ref=<?=$data['id']?>][img]<?=$site['site_url']?>/promo/banner2.gif[/img][/url]</textarea>                        
						</td>

					</tr>                   
				</table>
</div>

<?include('footer.php');?>