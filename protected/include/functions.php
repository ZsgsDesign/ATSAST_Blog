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
function yanzhengma(){
    $image = imagecreatetruecolor(100,30);
    $bgcolor = imagecolorallocate($image,255,255,255);//#FFFFFFFFFFFF
    imagefill($image,0,0,$bgcolor);
    for ($i=0;$i<4;$i++){
        $fontsize = 6;
        $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
        $fontcontent = rand(0,9);
        $x = ($i * 100/4)+rand(5,10);
        $y = rand(5,10);
        imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
    }
    for($i=0;$i<200;$i++){
        $pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
        imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);
    }
    header('content-type: image/png');
    imagepng($image);
    imagedestroy($image);
}