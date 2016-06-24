<?php 
$random = mt_rand(1,9); 
?>
<?
if(! defined('BASEPATH') ){ exit('Unable to view file.'); }
if($site['banner_system'] != 0){
	$db->Query("UPDATE `banners` SET `expiration`='0' WHERE `expiration`<'".time()."' AND `expiration`!='0'");
	$banners = $db->QueryFetchArrayAll("SELECT id,banner_url FROM `banners` WHERE `expiration`>'0' ORDER BY rand() LIMIT 2");
	if(!empty($banners)){
		echo '<div class="footer_banners">';
		foreach($banners as $banner){
			$db->Query("UPDATE `banners` SET `views`=`views`+ '3' WHERE `id`='".$banner['id']."'");
		//	echo '<span style="margin: 0 10px 0 10px"><a href="'.$site['site_url'].'/go_banner.php?go='.$banner['id'].'" target="_blank"><img src="'.$banner['banner_url'].'" width="468" height="60" alt="Banner - '.$site['site_url'].'" border="0" /></a></span>';
		}
		echo '</div>';
	}
}?>
	</div>
</div>
</html> 

<script type="text/javascript"> function langSelect(selectobj){ window.location.href='?peslang='+selectobj } </script>
<div id="footer">
    <ul class="footer_links" style="float:right;margin-right:15px;">
		<li><a href="contact.php"><?=$lang['b_47']?></a> |</li>
    	<li><a href="faq.php"><?=$lang['b_06']?></a> |</li>
		<?=($data['admin'] > 0 ? '<li><a href="admin-panel" target="_blank"><b>Control Panel</b></a> |</li>' : '')?>
    </ul>
</div>

<?if($data['admin'] == 1){?><p align="center" style="font-size:12px">Script: <?=(round(microtime(true)-$starttime - $db->UsedTime, 4))?> sec - Database: <?=(round($db->UsedTime, 4))?> sec - MySQL Queries: <?=$db->GetNumberOfQueries()?></p><?}?>
<?if($is_online){?>
<?}
if(!empty($site['analytics_id'])){?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?=$site['analytics_id']?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?}?>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9199027; 
var sc_invisible=0; 
var sc_security="f4a8e098"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hit counter"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9199027/0/f4a8e098/1/"
alt="hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
<!-- Powered By tronmoney.com-  -->
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"hrdsi1aUS/000a", domain:"http://localhost/clicktron/",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=hrdsi1aUS/000a" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->

<div style="position:absolute; top:150px; left:1050px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-4406170837401781";
/* info 3 */
google_ad_slot = "3750733751";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</body>

</html><? $db->Close(); ?>

