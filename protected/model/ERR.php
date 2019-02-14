<?php
class ERR{
    /**
     *@author John Zhang
     */

    public static function Catcher($ERR_CODE)
    {
        if(($ERR_CODE<1000)) $ERR_CODE=1000;
        $output=array(
             'ret' => $ERR_CODE,
            'desc' => self::Desc($ERR_CODE),
            'data' => null
        );
        exit(json_encode($output));
    }
    
    private static function Desc($ERR_CODE)
    {
        $ERR_DESC=array(
            '1000' => "Unspecified Error",
            '9001' => "您尚未登陆",
            '9002' => "参数不全",
            '9101' => "您已经赞过这篇文章了",
            '9102' => "您已经赞过这条评论了",
            '9201' => "非法的搜索关键字",
            '9202' => "未匹配到结果"
        );
        return isset($ERR_DESC[$ERR_CODE])?$ERR_DESC[$ERR_CODE]:$ERR_DESC['1000'];
    }
};