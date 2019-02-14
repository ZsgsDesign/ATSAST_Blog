<?php
/*
author:Brethland
*/
class AjaxController extends BaseController
{
    public function actionNewArticle() {
        if(!$this->is_login){
            ERR:Catcher(9001);
            exit;
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
    public function actionRateUpArticle(){
        $articles = new model ("articles");
        $row = $articles->find(array("aid=:aid",":aid"=>arg("AID")));
        $this->now_rate = $row["rate_up"];
        $art_up = new model ("art_up");
        $ret = $art_up->query("select * from art_up where aid=:aid and uid=:uid",array(":aid"=>arg("AID")),array(":uid"=>arg("UID")));
        if($ret){
            ERR::Catcher(9101);
            exit;
        }else{
            $new_rate_up = array(
                "aid"=>arg("AID"),
                "uid"=>arg("UID")
            );
            $art_up->create($new_rate_up);
            $articles->update(array("aid=:aid",":aid"=>arg("AID"),"rate_up=:rt",":rt"=>$this->now_rate+1));
        }
    }
    public function actionRateUpComment(){
        $comments = new model ("comments");
        $row = $comments->find(array("cid=:cid",":cid"=>arg("CID")));
        $this->now_rate = $row["rate_up"];
        $com_up = new model ("com_up");
        $ret = $com_up->query("select * from com_up where cid=:cid and uid=:uid",array(":cid"=>arg("CID")),array(":uid"=>arg("UID")));
        if($ret){
            ERR::Catcher(9102);
            exit;
        }else{
            $new_rate_up = array(
                "cid"=>arg("CID"),
                "uid"=>arg("UID")
            );
            $com_up->create($new_rate_up);
            $comments->update(array("cid=:cid",":cid"=>arg("CID"),"rate_up=:rt",":rt"=>$this->now_rate+1));
        }
    }
}