<?php
/*
author:Brethland
*/
class AjaxController extends BaseController
{
    public function actionArticleEdit() {
        if(!$this->islogin){
            $this->jump("{$this->MAIN_PAGE}/account/");
        }    
        $articles = new model("articles");
        $article_text = arg("article");
        $article_title = arg("title");
        $postid = $articles->query("select max(aid) from articles");
        if(arg("aid")==0){
            $newid = $postid[0]["max(aid)"]+1;
            if(arg("articlestatus") == 1) {
            $new = array(
                "aid" => $newid,
                "title" => $article_title,
                "text" => $article_text,
                "author" => $this->user_name,
                "time" => date('Y-m-d H:i:s',time()),
                "isdraft" => 1,
                "uid" => $this->user_info["uid"]
            );
            $articles->create($new);
            } else {
                $new = array(
                    "aid" => $newid,
                    "title" => $article_title,
                    "text" => $article_text,
                    "author" => $this->user_name,
                    "time" => date('Y-m-d H:i:s',time()),
                    "isdraft" => 0,
                    "uid" => $this->user_info["uid"]
                );
                $articles->create($new);
            }
        }
        else {
            if(arg("articlestatus") == 1) {
                $articles->update(array("aid=:aid",":aid"=>arg("aid")),array("title"=>$article_title,"text"=>$article_text,"time"=>date('Y-m-d H:i:s',time()),"isdraft"=>1));
                } else {
                    $articles->update(array("aid=:aid",":aid"=>arg("aid")),array("title"=>$article_title,"text"=>$article_text,"time"=>date('Y-m-d H:i:s',time()),"isdraft"=>0));
                }
        }
        //$this->jump("{$this->MAIN_PAGE}/admin/blog");
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
            $articles->update(array("aid=:aid",":aid"=>arg("AID")),array("rate_up"=>$this->now_rate+1));
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
            $comments->update(array("cid=:cid",":cid"=>arg("CID")),array("rate_up"=>$this->now_rate+1));
        }
    }
    public function actionPostart(){
        if(!$this->islogin){
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $articles = new model("articles");
        $changeid = arg("aid");
        if($changeid!=null){
        $row = $articles->find(array("aid=:aid",":aid"=>$changeid));
        if($_SESSION["UID"]!=$row["uid"]){
            exit;
        }
        $articles->update(array("aid=:aid",":aid"=>$changeid),array("isdraft"=>0));
        $this->jump("{$this->MAIN_PAGE}/admin/blog");
        }
    }
    public function actionDeletearticle() {
        if(!$this->islogin){
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $articles = new model ("articles");
        $deleteid = arg("aid");
        if($deleteid!=null){
            $row= $articles->find(array("aid=:aid",":aid"=>$deleteid));
            if($_SESSION["UID"]!=$row["uid"]){
                exit;
            }
        $articles->delete(array("aid=:aid",":aid"=>$deleteid));
        }
    }
    public function actionNeoCate() {
        if(!$this->islogin){
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $category = new model("category");
        $add_cate = arg("cate");
        $row = $category->query("select * from category where category.uid=:uid",array(":uid"=>$this->user_info["uid"]));
        $neo = $row[0]["category"].','.$add_cate;
        $category->update(array("uid=:uid",":uid"=>$this->user_info["uid"]),array("category"=>$neo));
        exit();
    }
    public function actionDelCate(){
        if(!$this->islogin){
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $category = new model("category");
        $del_cate = arg("cate");
        $row = $category->query("select * from category where category.uid=:uid",array(":uid"=>$this->user_info["uid"]));
        $arr = explode(",",$row[0]["category"]);
        var_dump($arr);
        $candel = 0;
        for($i = 0;$i<count($arr);$i++){
            if($arr[$i] == strtolower($del_cate)){
                unset($arr[$i]);
                $candel = 1;
                break;
            }
        }
        $neo = join(",",$arr);
        $category->update(array("uid=:uid",":uid"=>$this->user_info["uid"]),array("category"=>$neo));
        if(!$candel){
            $output=array(
                "ret"=>200,
                "des"=>"未找到你的分类！"
            );
            exit(json_encode($output));
        }
        exit();
    }
    public function actionChangeCate(){
        if(!$this->islogin){
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $articles = new model ("articles");
        $change_id = arg("aid");
        $changecate = arg("changecate");
        $articles->update(array("aid=:aid",":aid"=>$change_id),array("category"=>$changecate));
    }
}