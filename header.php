<?
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
		$errMsg = '<div><div class="err1">'.$lang['b_02'].'</div></div>';
		$sql = $db->Query("SELECT id,reason FROM `ban_reasons` WHERE `user`='".$data['id']."'");
		if($db->GetNumRows($sql) > 0){
			$ban = $db->FetchArray($sql);
			if(!empty($ban['reason'])){
				$_SESSION['PES_Banned'] = $data['id'];
				redirect('banned.php?id='.$data['id']);
			}
		}
	}elseif($data['activate'] > 0){
		$errMsg = '<a href="register.php?resend" title="Click here" style="text-decoration:none;color:#a32326"><div><div class="err1">'.$lang['b_03'].'</div></div></a>';
	}elseif($data['id'] != '') {
		if(isset($_POST['remember'])){
			setcookie('PESAutoLogin', 'ses_user='.$data['login'].'&ses_hash='.$pass, time()+604800, '/');
		}
		$db->Query("UPDATE `users` SET `log_ip`='".VisitorIP()."', `online`=NOW() WHERE `id`='".$data['id']."'");
		$_SESSION['EX_login'] = $data['id'];
		redirect('index.php');
	}else{
		$errMsg = '<div ><div class="err1">'.$lang['b_04'].'</div></div>';
	}
}
?>
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title> Get Facebook Likes, Social exchange, Youtube Views and make money</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-color.js"></script>
<script type="text/javascript" src="main.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Create your profile and start earning Facebook likes twitter followers and youtube views. Get unlimited instagram likes pinterest followers and website hits for your website. Earn Cash money online" />
<meta name="keywords" content="Get free likes, Social Exchange, social, Facebook Likes, SEO Tools, Facebook Likes, Twitter, Google Plus, YouTube Views, add fast, free fans, online likes, earn cash, make money, cash out,likes fast" />
<meta name="robots" content="all, index, follow" />
<meta name="author" content="Social Likes" />
<meta name="audience" content="all" />
<meta name="rating" content="General" />
<meta name="revisit-after" content="2 Days" />
<meta name="wot-verification" content="2f6d5e6aed2dd7a5df71"/>
<link rel="stylesheet" href="theme/pes/style.css" type="text/css" />
<link rel="stylesheet" href="theme/pes/style3.css" type="text/css" />



<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />





<script type="text/javascript" src="js/jquery.js"></script>
<?if($is_online){?><?}?>
<script type="text/javascript">
//<![CDATA[
window.__CF=window.__CF||{};window.__CF.AJS={"ga_key":{"ua":"UA-42945119-1","ga_bs":"2"}};
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) { var CloudFlare=[{verbose:0,p:1374532546,byc:0,owlid:"cf",mirage:{responsive:0,lazy:1},mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/abv=2706741234/"},atok:"0ef01ce3ccbed857d9a57f80413b67f5",zone:"tronmoney.com",rocket:"0",apps:{"ga_key":{"ua":"UA-42945119-1","ga_bs":"2"}}}];var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.async=!0;a.src="//ajax.cloudflare.com/cdn-cgi/nexp/abv=3609848800/cloudflare.min.js";b.parentNode.insertBefore(a,b);}}catch(e){};
//]]>
</script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js' type='text/javascript'></script>
<script src="http://24blogger-com.googlecode.com/files/jquery.colorbox-min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
if (document.cookie.indexOf('visited=true') == -1)
{
var fifteenDays = 1000*60*60*24*30;
var expires = new Date((new Date()).valueOf() + fifteenDays);
document.cookie = "visited=true;expires=" + expires.toUTCString();
$.colorbox({width:"400px", inline:true, href:"#exestylepopups"});
}
});
</script>
<style type="text/css">
/*
ColorBox v1.3.16
(Copyright (c) 2011 Jack Moore - jack@colorpowered.com)
*/
#colorbox,#cboxOverlay,#cboxWrapper{position:absolute;top:0;left:0;z-index:9999;overflow:hidden}#cboxOverlay{position:fixed;width:100%;height:100%}#cboxMiddleLeft,#cboxBottomLeft{clear:left}#cboxContent{position:relative}#cboxLoadedContent{overflow:auto}#cboxTitle{margin:0}#cboxLoadingOverlay,#cboxLoadingGraphic{position:absolute;top:0;left:0;width:100%}#cboxPrevious,#cboxNext,#cboxClose,#cboxSlideshow{cursor:pointer}.cboxPhoto{float:left;margin:auto;border:0;display:block}.cboxIframe{width:100%;height:100%;display:block;border:0}#cboxOverlay{background:#000;opacity:0.5 !important}#colorbox{box-shadow:0 0 15px rgba(0,0,0,0.4);-moz-box-shadow:0 0 15px rgba(0,0,0,0.4);-webkit-box-shadow:0 0 15px rgba(0,0,0,0.4)}#cboxTopLeft{width:14px;height:14px;background:url(http://4.bp.blogspot.com/-_VSGGUcsUPE/TwNIXL6W2qI/AAAAAAAAFwQ/5KR8F-N3Mqk/s1600/controls.png) no-repeat 0 0}#cboxTopCenter{height:14px;background:url(http://3.bp.blogspot.com/-dJQm3QEd5Iw/TxohpCter-I/AAAAAAAAF0Q/GRny7olLbv8/s400/border.png) repeat-x top left}#cboxTopRight{width:14px;height:14px;background:url(http://4.bp.blogspot.com/-_VSGGUcsUPE/TwNIXL6W2qI/AAAAAAAAFwQ/5KR8F-N3Mqk/s1600/controls.png) no-repeat -36px 0}#cboxBottomLeft{width:14px;height:43px;background:url(http://4.bp.blogspot.com/-_VSGGUcsUPE/TwNIXL6W2qI/AAAAAAAAFwQ/5KR8F-N3Mqk/s1600/controls.png) no-repeat 0 -32px}#cboxBottomCenter{height:43px;background:url(http://3.bp.blogspot.com/-dJQm3QEd5Iw/TxohpCter-I/AAAAAAAAF0Q/GRny7olLbv8/s400/border.png) repeat-x bottom left}#cboxBottomRight{width:14px;height:43px;background:url(http://4.bp.blogspot.com/-_VSGGUcsUPE/TwNIXL6W2qI/AAAAAAAAFwQ/5KR8F-N3Mqk/s1600/controls.png) no-repeat -36px -32px}#cboxMiddleLeft{width:14px;background:url(http://4.bp.blogspot.com/-_VSGGUcsUPE/TwNIXL6W2qI/AAAAAAAAFwQ/5KR8F-N3Mqk/s1600/controls.png) repeat-y -175px 0}#cboxMiddleRight{width:14px;background:url(http://4.bp.blogspot.com/-_VSGGUcsUPE/TwNIXL6W2qI/AAAAAAAAFwQ/5KR8F-N3Mqk/s1600/controls.png) repeat-y -211px 0}#cboxContent{background:#fff;overflow:visible}#cboxLoadedContent{margin-bottom:5px}#cboxLoadingOverlay{background:url(http://2.bp.blogspot.com/-bMneOFi_UDo/Txohpge3Z9I/AAAAAAAAF0s/AbVgxX9pXtQ/s400/loadingbackground.png) no-repeat center center}#cboxLoadingGraphic{http://3.bp.blogspot.com/-SKktU1-SCCw/TxohpRB19LI/AAAAAAAAF0Y/iwIo3LnjoE0/s400/loading.gif) no-repeat center center}#cboxTitle{position:absolute;bottom:-25px;left:0;text-align:center;width:100%;font-weight:bold;color:#7C7C7C}#cboxCurrent{position:absolute;bottom:-25px;left:58px;font-weight:bold;color:#7C7C7C}#cboxPrevious,#cboxNext,#cboxClose,#cboxSlideshow{position:absolute;bottom:-29px;background:url(http://4.bp.blogspot.com/-_VSGGUcsUPE/TwNIXL6W2qI/AAAAAAAAFwQ/5KR8F-N3Mqk/s1600/controls.png) no-repeat 0px 0px;width:23px;height:23px;text-indent:-9999px}#cboxPrevious{left:0px;background-position:-51px -25px}#cboxPrevious.hover{background-position:-51px 0px}#cboxNext{left:27px;background-position:-75px -25px}#cboxNext.hover{background-position:-75px 0px}#cboxClose{right:0;background-position:-100px -25px}#cboxClose.hover{background-position:-100px 0px}.cboxSlideshow_on #cboxSlideshow{background-position:-125px 0px;right:27px}.cboxSlideshow_on #cboxSlideshow.hover{background-position:-150px 0px}.cboxSlideshow_off #cboxSlideshow{background-position:-150px -25px;right:27px}.cboxSlideshow_off #cboxSlideshow.hover{background-position:-125px 0px}#mdfb{font:12px/1.2 Arial,Helvetica,san-serif;color:#666}#mdfb a,#mdfb a:hover,#mdfb a:visited{text-decoration:none}.mdbox-title{background:#000;color:#fff;font-size:20px !important;font-weight:bold;margin:10px 0;border:20px solid #ddd;-moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;box-shadow:5px 5px 5px #CCC;padding:10px;line-height:25px;font-family:arial !important}
</style>
<script type='text/javascript'>
jQuery(document).ready
(function(){jQuery("#facebook_right").hover(function(){ jQuery(this).stop(true,false).animate({right: 0}, 500); },
function(){ jQuery("#facebook_right").stop(true,false).animate({right: -200}, 500); });
jQuery("#twitter_right").hover(function(){ jQuery(this).stop(true,false).animate({right: 0}, 500); },
function(){ jQuery("#twitter_right").stop(true,false).animate({right: -250}, 500); });
jQuery("#google_plus_right").hover(function(){ jQuery(this).stop(true,false).animate({right: 0}, 500); },
function(){ jQuery("#google_plus_right").stop(true,false).animate({right: -203}, 500); });
jQuery("#feedburner_right").hover(function(){ jQuery(this).stop(true,false).animate({right: 0}, 500); },
function(){ jQuery("#feedburner_right").stop(true,false).animate({right: -303}, 500); }); });
</script>
<style type="text/css">
 
#share-buttons img {
width: 35px;
padding: 5px;
border: 0;
box-shadow: 0;
display: inline;
}
 
</style>
</head>
<body>
<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var refferer = (document.referrer) ? encodeURIComponent(document.referrer) : '';
var location  = (document.location) ? encodeURIComponent(document.location) : '';
po.src = '//livesupport.tronmoney.com/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(check_operator_messages)/true/(top)/600/(units)/pixels/(leaveamessage)/true/(disable_pro_active)/true?r='+refferer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>

<div style='display:none'>
<div id='exestylepopups' style='padding:10px; background:#fff;'>
<center><h3 class="mdbox-title">Please Give us a Like... Thank You</h3></center><center>
<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Flikesfastcom&amp;width=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23ffffff&amp;stream=false&amp;header=false&amp;height=258" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:258px;" allowtransparency="true"></iframe>
</center><p style=" float:right; margin-right:35px; font-size:9px;" >Get this <a style=" font-size:9px; color:#3B78CD; text-decoration:none;" href="http://justinmallette.com/Justin-Bieber-HeartBreaker-NewSong-Video.html" rel="Dofollow" >Here</a></p>
</div></div>

<style>

.header {
width: 100%;
height: 130px;
background: url(/menu/img/head.jpg);
}


.header_block {
	width: 100%;
	margin: 0 auto;
	display: inline-block;
	*display: inline;
	zoom: 1;
	padding-bottom: 35px;
}

.logo {
	float: left;
	padding: 5px 0 0 0px;
}
.header_right {
	float: right;
	padding-top: 30px;
	padding-right: 14px;
	color: #333;
	font-size: 17px;
	text-align: right;
	line-height: 11px;
	font-weight: bold;
}

.head-welcome {
	
}

.flr {
	float: right;
}

.pleft20 {
	padding-left: 20px;
}

.pleft10 {
	padding-left: 10px;
}

.points_count {
	color: #333;
	font-size: 34px;
}

.header_right a {
	color: #333;
	font-size: 20px;
}
.logout {
	/*background:url(/img/1322634486_lock_unlock.png) no-repeat left center;*/
	background: url(/img/logout_icon.png) no-repeat left center;
	padding: 12px 0 10px 30px;
}

.profile {
	background: url(/img/profile_icon.png) no-repeat left center;
	padding: 12px 0 10px 43px;
}

.my_referals {
	background: url(/img/my_referals.png) no-repeat left center;
	padding: 14px 0 10px 40px;
}

.reg_slider {
	width: 1003px;
	margin: 20px auto;
	display: inline-block;
}


</style>
<center class="head1">
<a class="bluebut" href="http://localhost/clicktron/about.php">About</a>
<a class="bluebut" href="http://localhost/clicktron/privacy.php">Privacy</a>
<a class="bluebut" href="http://tronmoney.com/faq.php">How To</a>
<a class="bluebut" href="http://localhost/clicktron/contact.php">Contact</a>

</center>
<div class="header">
<body bgcolor="#D1D0D0">
<div class="header_block">


	<div class="header-content">
	<h1 class="logo">
<a href="index.php" STYLE="text-decoration: none;color:black" ><img style="position: absolute; top:24px; left:140px; width:390px; height:120px" src="img/logo.png" alt="Facebook likes"></a>
	</h1>
	
	<ul id="navigation">
			<?if(!$is_online){?>
				<div>
<style>
input.l_form {
height: 14px;
min-width: 0px;
border: 2px solid #009F3C;
color: black;
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
border-image: initial;
margin-bottom: 8px;
float: center;
font-size: 15px;
padding:8px;
}

.home_txt {
text-align: left;
width: 350px;
color: #17343a;
font-size: 13px;
float: right;
font-family: verdana;
line-height: 120%;
}
.flash_top {
overflow: hidden;
text-align: center;
}
.flash-side {
float: left;
width: 610px;
}
.home_txt {
text-align: left;
width: 350px;
color: #17343a;
font-size: 13px;
float: right;
font-family: verdana;
line-height: 120%;
}
.try_button {
width: 296px;
height: 92px;
background: url(/images/layout/try_btn.png) repeat-x;
}
.home_txt .ptop3 {
float: left;
margin: 0 3px 0 0;
}
.clear {
clear: both;
}
.start_prom {
clear: both;
font-weight: bold;
font-size: 22px;
line-height: 150%;
font-family: myriad pro;
text-align: justify;
}


.msg div.error {
    background: none repeat scroll 0 0 transparent;
    border: medium none;
    color: #A32300;
    font-size: 16px;
    margin: 3px 0 0;
    padding: 0;
}

</style>
     
           <p></p><p></p><?=$errMsg?>
            <form style="margin-top:10px;" method="post" action="">
         
				<input style="border:1px solid black; background:#fff;" class="l_form" onfocus="if(this.value == 'Username / Email') { this.value = ''; }" onblur="if(this.value=='') { this.value = this.defaultValue }" value="Username / Email" name="login" type="text" size="18">
				<input style="border:1px solid black; background:#fff;" class="l_form" onfocus="if(this.value == 'Password') { this.value = ''; }" onblur="if(this.value=='') { this.value = this.defaultValue }" value="Password" name="pass" type="password" size="12">			 						
				
				
			
			<input class="gbut" name="connect" value="Login" type="submit"><br>
			<input type="checkbox" name="remember" size="" style="margin-left:15px;"><a style="color:#000; font-size:12px;">Remember me</a>
			<div style="text-decoration: none;  font-size: 12px; float: left;"><a style="text-decoration: none;color: rgb(0, 0, 0);" href="register.php"> Get Register</a> |  <a href="recover.php" style="text-decoration: none;color: rgb(0, 0, 0);">Forget Your Password</a></div>
				<!--<a href="recover.php" style="font-size:10px">You forgot your password?</a>
	<a href="register.php?resend" style="font-size:10px "><font color=black>Resend activation email?</font></a></b>-->
						  				  
			</form>
        </div>

<style>
.home_txt {
text-align: left;
width: 350px;
color: #17343a;
font-size: 13px;
float: right;
font-family: verdana;
line-height: 120%;
}
.flash_top {
overflow: hidden;
text-align: center;
}
.flash-side {
float: left;
width: 610px;
}
.home_txt {
text-align: left;
width: 350px;
color: #17343a;
font-size: 13px;
float: right;
font-family: verdana;
line-height: 120%;
}
.try_button {
width: 296px;
height: 92px;
background: url(/images/layout/try_btn.png) repeat-x;
}
.home_txt .ptop3 {
float: left;
margin: 0 3px 0 0;
}
.clear {
clear: both;
}
.start_prom {
clear: both;
font-weight: bold;
font-size: 22px;
line-height: 150%;
font-family: myriad pro;
text-align: justify;
}
.try_button a {
color: #020e1c;
font-size: 25px;
line-height: 70px;
text-transform: uppercase;
font-weight: bold;
margin: 0 0 0 25px;
}
.container{
background:url("/images/footerupback.png") no-repeat scroll center bottom transparent;
width:100%;
}
.add_site_item a {
    color: #333333;
    display: block;
    font-size: 18px;
    font-weight: bold;
    vertical-align: middle;
}
.add_site_item_sub a {
    color: #333333;
    display: block;
    font-size: 15px;
    font-weight: bold;
    padding: 3px;
    vertical-align: middle;
}
</style>
		        </ul>


		

<style>
.home_txt {
text-align: left;
width: 350px;
color: #17343a;
font-size: 13px;
float: right;
font-family: verdana;
line-height: 120%;
}
.flash_top {
overflow: hidden;
text-align: center;
}
.flash-side {
float: left;
width: 610px;
}
.home_txt {
text-align: left;
width: 350px;
color: #17343a;
font-size: 13px;
float: right;
font-family: verdana;
line-height: 120%;
}
.try_button {
width: 296px;
height: 92px;
background: url(/images/layout/try_btn.png) repeat-x;
}
.home_txt .ptop3 {
float: left;
margin: 0 3px 0 0;
}
.clear {
clear: both;
}
.start_prom {
clear: both;
font-weight: bold;
font-size: 22px;
line-height: 150%;
font-family: myriad pro;
text-align: justify;
}
.try_button a {
color: #020e1c;
font-size: 25px;
line-height: 70px;
text-transform: uppercase;
font-weight: bold;
margin: 0 0 0 25px;
}
</style>
		<?}else{?>
		<div class="header_right">
		
    	
			<div class="head-welcome"><span style="font:  Lucida Grande, Lucida, Verdana, sans-serif;font-size: 27px;font-weight:700;color:green"><?=get_currency_symbol($site['currency_code'])?> <?=$data['account_balance']?></span><a style="max-width:200px;font-size: 14px;color: rgb(255, 133, 0);text-decoration: none" href="cashout.php?convert"> Coins to Money</a> <IMG width="24" SRC="http://api.hostip.info/flag.php"><h2><?=lang_rep($lang['b_17'], array('-NUM-' => '&nbsp;<p class="coincount" id="c_coins">'.number_format($data['coins']).'</p>&nbsp;'))?></h2>

			</div>
	        <div class="flr pleft20">
	        	<span class="logout">  <a href="/logout.php" STYLE="text-decoration: none" >Logout</a></span>
    		</div>
    		<div class="flr pleft20">
	        	<span class="my_referals">  <a href="/referrals.php" STYLE="text-decoration: none" >My Referrals</a></span>
    		</div>
    		<div class="flr">
				<span class="profile"><a href="/profile.php" STYLE="text-decoration: none" >My Profile/Blog</a></span>
    		</div>
    </div>
		<?}?>
        </ul>
	</div>
</div>
<div class="container">
	<div class="main">
	<div class="sidebar">
	<?if(!$is_online){?>
		<? 
			$sql = $db->Query("SELECT uid, SUM(`today_clicks`) AS `clicks` FROM `user_clicks` GROUP BY uid ORDER BY `clicks` DESC LIMIT 3");
			if($db->GetNumRows($sql) >= 3){
		?>

		<?}?>
	<?}else{?>
	<div class="ucp_menu"> 
<link href="/menu/css/style2.css" rel="stylesheet" type="text/css" />
<div class="left">
							<!--right menu BEGIN-->
<div class="add_site">
	<a class="add-btn btn3-wrap" href="/addurl.php"><span>&nbsp;</span><div class="btn3">Add Site/Page</div></a>
		
		
		<div class="add_site_item">
			<a href="/mysites.php" STYLE="text-decoration: none" >
            	<span><img src="/menu/img/my_sites.jpg" alt="My Sites" title="My Sites"></span>
				My Sites
			</a>
		</div>

		<div class="add_site_item">
			<a href="/accounts.php?a=soundcloud" STYLE="text-decoration: none" >
            	<span><img src="/menu/img/s_accounts.jpg" alt="Social Accounts" title="Social Accounts"></span>
				Social Accounts
			</a>
		</div>
				
		<div class="add_site_item">
			<a href="/buy.php"  STYLE="text-decoration: none" >
            	<span><img src="/menu/img/buy_points.png" alt="Buy Coins" title="Buy Coins"></span>
				Buy Coins
			</a>
		</div>
		
		<div class="add_site_item">
			<a href="/cashout.php?withdraw" style="text-decoration: none">
            	<span><img src="/menu/img/cash.png" heigh="27" alt="Cash Out" title="Cash Out" width="27"></span>
				Cash Out
			</a>
		</div>
		<div class="add_site_item">
			<a href="/bonus.php" STYLE="text-decoration: none" >
            	<span><img src="/menu/img/bonus_points.jpg" alt="Daily Bonus" title="Daily Bonus"></span>
				Daily Bonus
			</a>
		</div>
				
		
		
		<div class="add_site_item">
			<a href="index.php" STYLE="text-decoration: none" >
            	<span><img src="/menu/img/free_points.jpg" alt="Free Coins" title="Free Coins"></span>
				Free Coins
			</a>
		</div>
									<div class="add_site_item_sub">
                	<img src="/menu/img/facebook_likes.jpg" alt="Facebook Like Fanpages" title="Facebook Like Fanpages" align="left" style="margin-right:5px;">
					<a href="/facebook.php" STYLE="text-decoration: none" >
						Facebook Like Fanpages
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>

									<div class="add_site_item_sub">
                	<img src="/menu/img/facebook_likes.jpg" alt="Facebook Photo Comment" title="Facebook Photo Comment" align="left" style="margin-right:5px;">
					<a href="/fbcomment.php" STYLE="text-decoration: none" >
						Facebook Photo Comment
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>

									<div class="add_site_item_sub">
                	<img src="/menu/img/facebook_likes.jpg" alt="Facebook Like Websites" title="Facebook Like Websites" align="left" style="margin-right:5px;">
					<a href="/fbsite.php" STYLE="text-decoration: none" >
						Facebook Like Websites
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


									<div class="add_site_item_sub">
                	<img src="/menu/img/facebook_likes.jpg" alt="Facebook Like Photos" title="Facebook Like Photos" align="left" style="margin-right:5px;">
					<a href="/fbphotos.php" STYLE="text-decoration: none" >
						Facebook Like Photos
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


							<div class="add_site_item_sub">
                	<img src="/menu/img/facebook_share.jpg" alt="Facebook Share" title="Facebook Share" align="left" style="margin-right:5px;">
					<a href="/fbshare.php" STYLE="text-decoration: none" >
						Facebook Share
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


							<div class="add_site_item_sub">
                	<img src="/menu/img/facebook_share.jpg" alt="Facebook Followers" title="Facebook Followers" align="left" style="margin-right:5px;">
					<a href="/fbfollow.php" STYLE="text-decoration: none" >
						Facebook Followers
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


							<div class="add_site_item_sub">
                	<img src="/menu/img/instagram.png" alt="Instagram Followers" title="Instagram Followers" align="left" style="margin-right:5px;">
					<a href="/instagram.php" STYLE="text-decoration: none" >
						Instagram Followers
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


							<div class="add_site_item_sub">
                	<img src="/menu/img/instagram.png" alt="Instagram Like" title="Instagram Like" align="left" style="margin-right:5px;">
					<a href="/instagramlike.php" STYLE="text-decoration: none" >
						Instagram Like
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


							<div class="add_site_item_sub">
                	<img src="/menu/img/google_circles.jpg" alt="Google +1" title="Google +1" align="left" style="margin-right:5px;">
					<a href="/googleplus.php" STYLE="text-decoration: none" >
						Google +1
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>

							<div class="add_site_item_sub">
                	<img src="/menu/img/twitter.jpg" alt="Twitter Followers" title="Twitter Followers" align="left" style="margin-right:5px;">
					<a href="/twitter.php" STYLE="text-decoration: none" >
						Twitter Followers
						<div class="clear"></div>
					</a>
		
					<div class="clear"></div>
				</div>
							<div class="add_site_item_sub">
                	<img src="/menu/img/twitter_tweets.jpg" alt="Twitter Tweets" title="Twitter Tweets" align="left" style="margin-right:5px;">
					<a href="/tweet.php" STYLE="text-decoration: none" >
						Twitter Tweets
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>

				<div class="add_site_item_sub">
                	<img src="/menu/img/youtube_subscribe.jpg" alt="YouTube Views" title="YouTube Subscribe" align="left" style="margin-right:5px;">
					<a href="youtubesubscribe.php" STYLE="text-decoration: none" >
						YouTube Subscribe
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
				
						<div class="add_site_item_sub">
                	<img src="/menu/img/youtube_views.jpg" alt="Youtube Comment" title="Youtube Comment" align="left" style="margin-right:5px;">
					<a href="/ytcom.php" STYLE="text-decoration: none" >
						Youtube Comment
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
				
							<div class="add_site_item_sub">
                	<img src="/menu/img/youtube_views.jpg" alt="YouTube Views" title="YouTube Views" align="left" style="margin-right:5px;">
					<a href="youtube.php" STYLE="text-decoration: none" >
						YouTube Views
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
							<div class="add_site_item_sub">
                	<img src="/menu/img/youtube_likes.jpg" alt="YouTube Likes" title="YouTube Likes" align="left" style="margin-right:5px;">
					<a href="/ytlike.php" STYLE="text-decoration: none" >
						YouTube Likes
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>

							<div class="add_site_item_sub">
                	<img src="/menu/img/youtube_likes.jpg" alt="YouTube Dislikes" title="YouTube Dislikes" align="left" style="margin-right:5px;">
					<a href="/ytdlike.php" STYLE="text-decoration: none" >
						YouTube Dislikes
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>

				<div class="add_site_item_sub">
                	<img src="/menu/img/linkedin.jpg" alt="LinkedIn Share" title="LinkedIn Share" align="left" style="margin-right:5px;">
					<a href="/inshare.php" STYLE="text-decoration: none" >
						LinkedIn Share
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
				
							<div class="add_site_item_sub">
                	<img src="/menu/img/pinterest.png" alt="Pinterest Followers" title="Pinterest Followers" align="left" style="margin-right:5px;">
					<a href="/pinterest.php" STYLE="text-decoration: none" >
						Pinterest Followers
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>

							<div class="add_site_item_sub">
                	<img src="/menu/img/pinterest_repin.png" alt="Pinterest Repins" title="Pinterest Repins" align="left" style="margin-right:5px;">
					<a href="/pinterestrepins.php" STYLE="text-decoration: none" >
						Pinterest Repins
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


							<div class="add_site_item_sub">
                	<img src="/menu/img/pinterest_like.png" alt="Pinterest Like" title="Pinterest Like" align="left" style="margin-right:5px;">
					<a href="/pinterestlike.php" STYLE="text-decoration: none" >
						Pinterest Like
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>


							<div class="add_site_item_sub">
                	<img src="/menu/img/stumbleupon_followers.jpg" alt="StumbleUpon" title="StumbleUpon" align="left" style="margin-right:5px;">
					<a href="/stumble.php" STYLE="text-decoration: none" >
						StumbleUpon
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
							<div class="add_site_item_sub">
                	<img src="/menu/img/soundcloud_follow.png" alt="SoundCloud Follow" title="SoundCloud Follow" align="left" style="margin-right:5px;">
					<a href="/soundcloud.php"  STYLE="text-decoration: none" >
						SoundCloud Follow
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
							<div class="add_site_item_sub">
                	<img src="/img/icons/yousecond.png" hight=27 width=27 alt="YouSecond Friends" title="YouSecond Friends" align="left" style="margin-right:5px;">
					<a href="/yousecond.php"  STYLE="text-decoration: none" >
						YouSecond Friends
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
							<div class="add_site_item_sub">
                	<img src="/menu/img/websites.jpg" alt="Website Hits" title="Website Hits" align="left" style="margin-right:5px;">
					<a href="/traffic.php" STYLE="text-decoration: none"  >
						Website Hits
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
							
							<div class="add_site_item_sub">
                	<img src="/menu/img/ads-ico.jpg" alt="Banner Ads" title="Banner Ads" align="left" style="margin-right:5px;">
					<a href="/banners.php"  STYLE="text-decoration: none" >
						Banner Ads
						<div class="clear"></div>
					</a>
					<div class="clear"></div>
				</div>
		</div><!--right menu END-->


	</div>
<?}?></div>


