<?php
include('header.php');
if(!$is_online){
	redirect('index.php');
	exit;
}
?>
<?
if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
$sql = $db->Query("SELECT uid, SUM(`total_clicks`) AS `clicks` FROM `user_clicks` GROUP BY uid ORDER BY `clicks` DESC LIMIT 100");
$tops = $db->FetchArrayAll($sql);
?>
<section id="content" class="container_12 clearfix ui-sortable" data-sort=true>
<div align="left"
		<h1 class="content">Top 100 Users</h1>
			<div class="grid_12">
				<div>
					<table ALIGN=Left rules="rows">
						<thead>
							<tr>
								<th ALIGN=Left>Top</th>
								<th ALIGN=Left>Username</th>
								<th ALIGN=Left>Country</th>

							</tr>
						</thead>
						<tbody>
<?
$j = 0;
foreach($tops as $top){
	$j++;
	$user = $db->QueryFetchArray("SELECT id,login,email,country,coins FROM `users` WHERE `id`='".$top['uid']."'");
?>	
							<tr ALIGN=Left>
								<td><?=$j?>)</td>
								<td><a><?=$user['login']?></a></td>
								<td><b><?=($user['country'] == '0' ? 'N/A' : get_country($user['country']))?></b></td>
								</td>
							</tr>
<?}?>
						</tbody>
                    </table>
				</div>
			</div>
</div>
		</section>
<?include('footer.php');?>
