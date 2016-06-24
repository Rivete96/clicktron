<?include('header.php');?>
<style type="text/css"> a.FAQ{background:#efefef;color:#00386b;font-size:11px;font-family:Verdana;margin-bottom:5px;width:100%;padding:10px;width:100%;border:1px solid #ddd;border-radius:4px;display:block;text-decoration:none;}a.FAQ:hover{background:#ddd;}a.FAQ span{font-weight:bold;}a.FAQ div{display:none;padding-top:10px;font-size:12px;color:#777;} </style>
<script type="text/javascript"> $('.FAQ').live('click', function(e){ e.preventDefault(); $item = $(this).find('div'); $item.slideToggle('fast'); }); </script>
<div class="content t-left">
<h2 class="title"><?=$lang['b_06']?></h2>
<?
$sql = $db->Query("SELECT question,answer FROM `faq` ORDER BY id ASC");
if($db->GetNumRows($sql) == 0){
	echo '<div class="msg"><div class="info">'.$lang['b_250'].'</div></div>';
}
$j = 0;
foreach($db->FetchArrayAll($sql) as $faq){
	$j++;
	echo '<a class="FAQ" href="javascript:void(0)" style="width: 620px;"><span>'.$j.') '.$faq['question'].'</span><div>'.BBCode(nl2br($faq['answer'])).'</div></a>';
}
?>
</div>
<?include('footer.php');?>