<?php
if (!empty($_COOKIE['ct21adminlogin'])) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->del($_COOKIE['ct21adminlogin']);
    unset($_COOKIE['ct21adminlogin']);
}

setcookie('ct21adminlogin', null, -1, '/');

header("Location: ./");
