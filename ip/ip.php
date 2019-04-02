<?php
 
error_reporting(0); //抑制错误
@header("content-Type: text/html; charset=utf-8"); //语言调整为utf-8
 
//获取IP地址
$ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$ip = ($ip) ? $ip : $_SERVER["REMOTE_ADDR"];
logResult($ip);//引用接口
 
//echo sprintf("欢迎光临！你的IP地址是:%s",$ip);
 
function logResult($word='') {
    $fp = fopen("log.txt","a");
    flock($fp, LOCK_EX) ;
    fwrite($fp,"记录时间：".strftime("%Y%m%d%H%M%S",time()).",IP:".$word."\n");
    flock($fp, LOCK_UN);
    fclose($fp);
}