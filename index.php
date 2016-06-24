<?php
include('header.php');
if(!$is_online){?>

<div>
</div>
<a aling="right" href="register.php">
<div class="twitter-hover social-slide" alt="Twitter and tweets"></div>
<div class="facebook-hover social-slide"></div>
<div class="google-hover social-slide"></div>
<div class="linkedin-hover social-slide"></div>
<div class="pinterest-hover social-slide"></div>
<div class="youtube-hover social-slide"></div>
<div class="instagram-hover social-slide"></div>
<div class="tumblr-hover social-slide"></div>
<div class="reddit-hover social-slide"></div>
<div class="stumbleupon-hover social-slide"></div></a>
<b><font size="5">This site is the way to increase your</font>  <span style="font-weight:600;color:green;font-size:50px">fans and earn money.</span></b><a href="register.php" ><img width="50" src="img/money.png" alt="Twitter followers"></a>


<div class="home_txt">
  	<div class="try_button"><a  STYLE="text-decoration: none" href="register.php">Register FREE</a></div>
  	       <div class="ptop3"><img src="order_icon.jpg" alt="Facebook Likes"></div>
       <div class="whome_text"> www.dineromatic50.com/likes is a network that will help you grow your social presence. We allow you to look and choose who you want to like/subscribe/follow/view and skip those who you are not interested in.</div>
       <div class="clear height25"></div>
           <div class="ptop3"><img src="order_icon.jpg" alt="earn money online"></div>
       <div class="whome_text">Easy registration, 100 points at start and 200 daily bonus points for active users.</div>
       <div class="clear height25"></div>
           <div class="ptop3"><img src="order_icon.jpg" alt="youtube views"></div>
       <div class="whome_text">www.dineromatic50.com/likes doesn't sell likes/subscribes/followers/views/hits. We will never request for usernames and passwords of&nbsp; your social network accounts and will never post, tweet or update status from your accounts.</div>
       <div class="clear height25"></div>
        <div class="start_prom">Start Promotion Right Now and Get Your First <span>100 points</span></div>
</div>

	</div>
<center><a href="register.php"><img src="img/facebook.png" alt="facebook fans" title="Register" width="196" height="120" class="home-img"></a>
<table width="896" cellpadding="0" cellspacing="0" style="text-align:left; margin-left:70px; margin-top:20px;">
  <colgroup><col width="118">
  <col width="361">

  

    </colgroup><tbody><tr>
      <td colspan="2" width="900">
<h1 style="color:#000; float:none; padding:0;">What we offer?</h1> <h2> Get free likes</h2>
We offer almost every facility, which can help you in growing bigger and bigger in the social media. You can get everything free under our business umbrella – let us discuss the core facilities in details:</td>
    </tr>

  <tr>
    <td width="166" height="103"><img src="img/facebook.png" alt="facebook"></td>
    <td width="728"><p></p><h2> Facebook Likes :</h2>
      We provide you with all the essential Facebook  features that strengthen your standing on Facebook. We provide you with free  services including;<p></p>
      <ul>
        <li>Get Facebook likes for pages</li>
        <li>Facebook Comments</li>
        <li>Photo/Posts and website shares</li>
        <li>   <a href="http://www.casino.nf/">http://www.casino.nf/</a></li>
        <li><a href="http://www.directoryworld.net/" target="_blank">Directory World</a></li>
        <li><strong><h2>Free  Facebook likes</h2></strong> on posts/photo and websites.</li>
      </ul>
    Not  only this, we provide you with a great following on the Facebook – concisely,  our services would make you a rich social media business</td>
  </tr>
  <tr>
    <td width="166" height="103"><img src="img/pintrest.png" alt="Pinterest likes"></td>
    <td><p></p><h3>Pinterest:</h3>
    One of the newest social media hub, which enables one  to talk via images. It is truly beautiful. We shall use this medium to bring  you better business. We would make sure that we design the package in such a  way that you can get maximum pinterest repins, likes and following. Great  business make sure they are present everywhere because if you would lack, your  competitors would not – so, you must take necessary measure with some who is  reliable and effective with such services.<p></p></td>
  </tr>
  <tr>
    <td width="166" height="103"><img src="img/twitter.png" alt="Twitter and follow"></td>
    <td><p></p><h3>Twitter:</h3>
    A business these days must have twitter feeds – it is  one of the essentials that must not be overlooked. We would provide you with  constant tweets and retweets – not only this but with our services, you can get<strong> free twitter followers. </strong><p></p></td>
  </tr>
  <tr>
    <td width="166" height="103"><img src="img/youtube.png" alt="Youtube Views"></td>
    <td><p></p><h3>YouTube:</h3>
    It is the only medium through which ideas can be made  viral, instantly. With our service, you would be able to get desired <strong>YouTube Views,</strong>Likes, comments and following. <p></p></td>
  </tr>
  <tr>
    <td width="166" height="103"><img src="img/other.png" alt="Linkedin shares Google plus instagram followers"></td>
    <td><p></p><h3>Other than these giant social media gangsters, you can  get services including:</h3><p></p>
      <ul>
        <li>LinkedIn Shares</li>
        <li>Google plus</li>
        <li>Instagram Followers/Likes</li>
        <li>Stumble upon Followers</li>
        <li>Sound cloud following</li>
      </ul>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Dineromatic101 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-4646333954771345"
     data-ad-slot="1873342514"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

    <p>We are the sole providers of such phenomenal services  and that’s even for free – join us to avail services like no other. </p></td>

   </tr>

  

</tbody></table></center>
</div>
<?
}else{
$warn_active = 0;
if($data['warn_message'] != ''){
	$warn_active = 1;
	if($data['warn_expire'] < time()){
		$db->Query("UPDATE `users` SET `warn_message`='', `warn_expire`='0' WHERE `id`='".$data['id']."'");
		$warn_active = 0;
	}
}
?>
<div class="social-options text-center">
						<!-- FB -->
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=150114521817206";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-like" data-href="http://localhost/clicktron/" data-width="150" data-height="50" data-colorscheme="light" data-layout="box_count" data-action="like" data-show-faces="false" data-send="false"></div>
						
						<!-- G+ -->
						<div class="g-plusone" data-size="tall" data-href="index.php"></div>
						<script type="text/javascript">
						  window.___gcfg = {lang: 'en-GB'};
						
						  (function() {
						    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						    po.src = 'https://apis.google.com/js/plusone.js';
						    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						  })();
						</script>
						
						<!-- Twitter -->
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://localhost/clicktron/" data-counturl="http://localhost/clicktron/" data-lang="en" data-count="vertical">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script src="//platform.linkedin.com/in.js" type="text/javascript">
 lang: en_US
</script>
<script type="IN/Share" data-url="http://localhost/clicktron" data-counter="top"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- info 6 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-4406170837401781"
     data-ad-slot="2428777754"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<style>
.btn2 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 35px;
font-weight: normal;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
</style>

<div class="content"><h2 class="title"></h2>
	<?if($warn_active){?><div style="margin-bottom: 0px"><div class="err1"><?=$data['warn_message']?></div></div><?}elseif($site['c_show_msg'] == 1 && $site['c_text_index'] != ''){?><a href="buy.php"><div class="msg" style="margin-bottom:-8px"><div class="info"><?=$site['c_text_index']?></div></div></a><?}?>
<a><div style="margin-bottom:-15px"><div></div></a>

<div class="issestlogin" style="border:3px dashed #0099FF; padding:10px;">
<div><center>
<style>
.btn2 {
cursor: pointer;
color: #FFFFFF;
background: #9edd4a;
border: solid 1px #bdee45;
font-weight: bold;
text-align: center;
font-size: 35px;
font-weight: normal;
padding: 0 90px;
height: 44px;
line-height: 44px;
}
</style>
<a href="cashout.php?convert" class="single_like_button1">
						                    <span></span><div class="btn2"><img src="http://www.dineromatic50.com/likes/menu/img/cash.png" alt="Cash Out" width="128" height="128" title="Cash Out" heigh="37"> New Convert Coins to Money</div>
</a><span></span>
  <p></p>
<a href="cashout.php?withdraw" class="single_like_button1">
						                    <span></span>

</a></center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Dineromatic101 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-4646333954771345"
     data-ad-slot="1873342514"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<center><p style="margin-top: 1em"> <font color="#0000ff" size="2" face="sans-serif">Hello. This is the best way to make money by us. Send your referral link to your friends and social profiles and for every new registered active user you 'll earn 0.25$. Convert your Coins in to cash and make  a payout at 10.00$ tronmoney.com Team</font> </p> </center>
 Promote Us and Get <b><?=lang_rep($lang['b_114'], array('-NUM-' => $site['ref_coins']))?>.
 <br>And Get 0.25$ for each user that sign up to our site from this link.</br> <br> Your Refferal Code :</b>

<input type="text" readonly="true" style="font-size:10px;padding:4px;width:270px;margin:0 auto;" onclick="this.select()" value="<?=$site['site_url']?>/?ref=<?=$data['id']?> "></div>
	<div id="share-buttons">
 
<!-- Facebook -->
<a href="http://www.facebook.com/sharer.php?u=<?=$site['site_url']?>/?ref=<?=$data['id']?>" target="_blank"><img src="http://www.dineromatic50.com/likes/images/facebook.png" alt="Facebook Share"/></a>
 
<!-- Twitter -->
<a href="http://twitter.com/share?url=<?=$site['site_url']?>/?ref=<?=$data['id']?>&text=Get free likes, youtube views and twitter followers" target="_blank"><img src="http://www.dineromatic50.com/likes/images/twitter.png" alt="Twitter Tweet"/></a>
 
<!-- Google+ -->
<a href="https://plus.google.com/share?url=<?=$site['site_url']?>/?ref=<?=$data['id']?>" target="_blank"><img src="http://www.dineromatic50.com/likes/images/google.png" alt="Google Share" /></a>
 
<!-- Digg -->
<a href="http://www.digg.com/submit?url=<?=$site['site_url']?>/?ref=<?=$data['id']?>" target="_blank"><img src="http://www.dineromatic50.com/likes/images/diggit.png" alt="Digg" /></a>
 
<!-- Reddit -->
<a href="http://reddit.com/submit?url=<?=$site['site_url']?>/?ref=<?=$data['id']?>&title=Get free likes and followers" target="_blank"><img src="http://www.dineromatic50.com/likes/images/reddit.png" alt="Reddit" /></a>
 
<!-- LinkedIn -->
<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$site['site_url']?>/?ref=<?=$data['id']?>" target="_blank"><img src="http://www.dineromatic50.com/likes/images/linkedin.png" alt="LinkedIn Share" /></a>
 
<!-- Pinterest -->
<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><img src="http://www.dineromatic50.com/likes/images/pinterest.png" alt="Pinterest Share" /></a>
 
<!-- StumbleUpon-->
<a href="http://www.stumbleupon.com/submit?url=<?=$site['site_url']?>/?ref=<?=$data['id']?>&title=Get free likes and followers" target="_blank"><img src="http://www.dineromatic50.com/likes/images/stumbleupon.png" alt="StumbleUpon" /></a>
 
<!-- Email -->
<a href="mailto:?Subject=Make free fans and followers &Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?=$site['site_url']?>/?ref=<?=$data['id']?>"><img src="http://www.dineromatic50.com/likes/images/email.png" alt="Email Friend" /></a>
 
</div>
	 <p>Click Here To Check Your Refferals Points <a href="referrals.php"><u>My Referrals</u></a></p><p>
</p></div>
<style>
#images{
    text-align:center;
    margin:10px auto; 
}
#images a{
    margin:0px 10px;
    display:inline-block;
    text-decoration:none;
    color:black;
 }
</style>
<h2 style="font-size:40px">Earn Coins!</h2>
<div id="images">
    <a href="facebook.php">
        <img src="img/f.png" alt="Facebook likes" width="75px" height="75px">
        <div class="caption">FB Like</div>
    </a>
    <a href="fbcomment.php">
        <img src="img/f.png" alt="facebook comments" width="75px" height="75px"> 
        <div class="caption">FB comment</div>
    </a>
	    <a href="fbsite.php">
        <img src="img/f.png" alt="like website" width="75px" height="75px"> 
        <div class="caption">FB Website</div>
    </a>
	    <a href="fbphotos.php">
        <img src="img/f.png" alt="like photos" width="75px" height="75px"> 
        <div class="caption">FB Photo</div>
    </a>
	    <a href="fbshare.php">
        <img src="img/f.png" alt="facebook share" width="75px" height="75px"> 
        <div class="caption">FB Share</div>
    </a>
	    <a href="fbfollow.php">
        <img src="img/f.png" facebook followers width="75px" height="75px"> 
        <div class="caption">FB Follow</div>
    </a>
				    <a href="youtubesubscribe.php">
        <img src="img/y.png" alt="Youtube subscribers" width="75px" height="75px"> 
        <div class="caption">YT Subs</div>
    </a>
		    <a href="ytcom.php">
        <img src="img/y.png" alt="Youtube Comments" width="75px" height="75px"> 
        <div class="caption">YT Comment</div>
    </a>
		    <a href="youtube.php">
        <img src="img/y.png" alt="Youtube Views" width="75px" height="75px"> 
        <div class="caption">YT Views</div>
    </a>
			    <a href="ytlike.php">
        <img src="img/y.png" alt="Youtube Likes" width="75px" height="75px"> 
        <div class="caption">YT Likes</div>
    </a>
			    <a href="ytdlike.php">
        <img src="img/y.png" alt="Youtube Dislikes" width="75px" height="75px"> 
        <div class="caption">YT Dislike</div>
    </a>
		    <a href="googleplus.php">
        <img src="img/g.png" alt="Google plus" width="75px" height="75px"> 
        <div class="caption">Google +1</div>
    </a>
				    <a href="pinterest.php">
        <img src="img/p.png" alt="Pin Followers" width="75px" height="75px"> 
        <div class="caption">PIN Follow</div>
    </a>
			    <a href="pinterestrepins.php">
        <img src="img/p.png" alt="Pin Repins" width="75px" height="75px"> 
        <div class="caption">PIN Repins</div>
    </a>
				    <a href="pinterestlike.php">
        <img src="img/p.png" alt="Pin Likes" width="75px" height="75px"> 
        <div class="caption">PIN Like</div>
    </a>
					    <a href="soundcloud.php">
        <img src="img/su.png" width="75px" height="75px"> 
        <div class="caption">SC Follow</div>
    </a>
					    <a href="stumble.php">
        <img src="img/s.png" width="75px" height="75px"> 
        <div class="caption">StumbleU</div>
    </a>
							    <a href="yousecond.php">
        <img src="img/icons/yousecond.png" width="75px" height="75px"> 
        <div class="caption">YS Friends</div>
    </a>
	    <a href="instagram.php">
        <img src="img/i.png" width="75px" height="75px"> 
        <div class="caption">INS Follow</div>
    </a>
	    <a href="instagramlike.php">
        <img src="img/i.png" width="75px" height="75px"> 
        <div class="caption">INS Like</div>
    </a>
			    <a href="twitter.php">
        <img src="img/t.png" width="75px" height="75px"> 
        <div class="caption">TW Follow</div>
    </a>
		    <a href="tweet.php">
        <img src="img/t.png" width="75px" height="75px"> 
        <div class="caption">TW Tweet</div>
    </a>
	    <a href="inshare.php">
        <img src="img/l.png" width="75px" height="75px"> 
        <div class="caption">In Shares</div>
    </a>
						    <a href="traffic.php">
        <img src="img/WH.png" width="75px" height="75px"> 
        <div class="caption">WH</div>
    </a>
</div>
<h2 style="font-size:20px">Banner Ads/Soundcloud Account</h2>
<div id="images">
						    <a href="banners.php">
        <img src="menu/img/ads-ico.jpg" width="75px" height="75px"> 
        <div class="caption">Banner Ads</div>
		</a>
								    <a href="accounts.php?a=soundcloud">
        <img src="img/su.png" alt="make money" width="75px" height="75px"> 
        <div class="caption">Soundcloud Account</div>
    </a>
	</div>
</div>

<div><div></div></div>

</div>
<?}include('footer.php');?>
