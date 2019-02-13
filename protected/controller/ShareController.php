<?php
/*
author:duserqq
*/
class Share extends Controller
{
    public function upAction(){
        
        $art_id=(int)$_GET['art_id'];//获取当前看到文章id
        //判断是否点过赞了
        if(!isset($_SESSION["up{$art_id}"])){
            $model=new \Model\ShareModel();
            $model->up($art_id);
            $_SESSION["up{$art_id}"]=1;
        }
    }
    
    public function shareArt(){
        
        $user=$_SESSION['name'];
        $art_id=(int)$_GET['art_id'];
        if(!isset($_SESSION['share{$art_id}'])){
            $model=new \Model\ShareModel();
            $model->share($art_id);
            $_SESSION['share{$art_id}']=1;
        }
    }
}