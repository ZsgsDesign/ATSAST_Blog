<?php
/*
author:Brethland
*/
class AjaxController extends BaseController
{
    public function actionNewArticle() {
        if(!$this->is_login){
            ERR:Catcher(9001);
        }        
        $articles = new model("articles");
        $article_written = arg("article");
        if(arg("articlestatus") == 1) {
            $articles->create(array("text = :txt",":txt"=>$article_written,"author = :author",":author"=>$usr_info["name"],"time = :time",":time"=>date('Y-m-d H:i:s',time()),"isdraft = :isdraft",":isdraft"=>1,"uid = :uid",":uid"=>arg("UID")));
            $ret = array(
                'id' => 101,
                'desc' =>  "保存草稿成功"
            );
            return json_encode($ret);
        } else {
            $articles->create(array("text = :txt",":txt"=>$article_written,"author = :author",":author"=>$usr_info["name"],"time = :time",":time"=>date('Y-m-d H:i:s',time()),"isdraft = :isdraft",":isdraft"=>0,"uid = :uid",":uid"=>arg("UID")));
            $ret = array(
                'id' => 100,
                'desc' =>  "发布成功"
            );
            return json_encode($ret);
        }
    }
}