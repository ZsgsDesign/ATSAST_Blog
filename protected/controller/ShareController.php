<?php
/*
author:Brethland
*/
class ShareController extends BaseController
{   
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