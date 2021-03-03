<?php
function getcss($path, $local = false)
{
    global $logininfo;
    $cdn_host = $local ? "" : ($logininfo['ischina'] ? "//cdn.bootcdn.net/" : "//cdnjs.cloudflare.com/");
    echo ' <link href="' . $cdn_host . $path . '" rel="stylesheet">';
}

function getjs($path, $local = false)
{
    global $logininfo;
    $cdn_host = $local ? "" : ($logininfo['ischina'] ? "//cdn.bootcdn.net/" : "//cdnjs.cloudflare.com/");
    echo '<script src="' . $cdn_host . $path . '"></script>';
}

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$logininfo = $redis->hGetAll($_COOKIE['ct21adminlogin']);
$logininfo['ischina'] = false;
