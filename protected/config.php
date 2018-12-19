<?php

date_default_timezone_set('PRC');

$config = array(
    'rewrite' => array(
        '<a>'                                                => 'main/<a>',
        '/'                                                  => 'main/index',
    ),
);

$domain = array(
    "www.sastblog.com" => array( // 调试配置
        'debug' => 1,
        'maintain' => 0,
        'mysql' => array(
            'MYSQL_HOST' => "localhost",
            'MYSQL_PORT' => "3306",
            'MYSQL_USER' => "root",
            'MYSQL_DB'   => "ATSAST_BLOG",
            'MYSQL_PASS' => "root",
            'MYSQL_CHARSET' => 'utf8',
        ),
    ),
);
// 为了避免开始使用时会不正确配置域名导致程序错误，加入判断
if(empty($domain[$_SERVER["HTTP_HOST"]])) die("配置域名不正确，请确认".$_SERVER["HTTP_HOST"]."的配置是否存在！");

return $domain[$_SERVER["HTTP_HOST"]] + $config;