<?php

function getIp() {



$ip = $_SERVER['REMOTE_ADDR'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

$ip = $_SERVER['HTTP_CLIENT_IP'];

} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

}

return $ip;
}
$ip = getIp();

$ip2 = $HTTP_SERVER_VARS['HTTP_X_CLUSTER_CLIENT_IP'];

echo $ip;
print "</br>";
echo $ip2;
$ip3 = $_SERVER['REMOTE_ADDR'];
$ip4 = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ip5 = $_SERVER['HTTP_VIA'];
$ip6 = $_SERVER['HTTP_CLIENT_IP'];
echo $ip3;
print "</br>";
print "IP4 is $ip4";
print "</br>";
print "IP5 is $ip5";
print "</br>";
print "IP6 is $ip6";
print "</br>";

?> 