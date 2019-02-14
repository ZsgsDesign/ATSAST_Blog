<?php

function getIP()
{
    if (@$_SERVER["HTTP_X_FORWARDED_FOR"]) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (@$_SERVER["HTTP_CLIENT_IP"]) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (@$_SERVER["REMOTE_ADDR"]) {
        $ip = $_SERVER["REMOTE_ADDR"];
    } elseif (@getenv("HTTP_X_FORWARDED_FOR")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } elseif (@getenv("HTTP_CLIENT_IP")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif (@getenv("REMOTE_ADDR")) {
        $ip = getenv("REMOTE_ADDR");
    } else {
        $ip = "Unknown";
    }
    return $ip;
}
function is_login()
{
    $is_login=1;
    @$UID=$_SESSION["UID"];
    if (!$UID){
        $is_login = 0;
    }
    return $is_login;
}
function getuserinfo($uid)
{
    $user_db=new Model("users");
    return $user_db->find(array("uid = :uid",":uid" => $uid));
}
function getgravatar($email) {
	$url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email)));
	return $url;
}