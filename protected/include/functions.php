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