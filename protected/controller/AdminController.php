<?php
/*
author:Brethland
*/
class AdminController extends BaseController 
{
    public function actionIndex() {
        if($this->islogin){
            $usr_info = getuserinfo($_SESSION["UID"]);
        }else {
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $this->gender = $usr_info['gender']==1?'♂':'♀';
        $this->introduction = $usr_info['introduction'];
    }
    public function actionBlog() {
        if($this->islogin){
            $usr_info = getuserinfo($_SESSION["UID"]);
        }else {
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $category = new model ("category");
        $articles = new model("articles");
        $row = $category->query("select * from category where category.uid = :uid",array(":uid"=>$usr_info["uid"]));
        $s = $row[0]["category"];
        $cate_this_usr = explode(",",$s);
        $this->cate_this_usr = $cate_this_usr;
        $article_incate = array();
        $article_count=array();
        foreach ($cate_this_usr as $cate){
            $article_incate[$cate] = $articles->query("select * from articles where articles.category=:category and articles.uid=:uid",array(":category"=>$cate,":uid"=>$usr_info["uid"]));
            $article_count[$cate] = count($article_incate[$cate]);
        }
        $this->article_incate = $article_incate;
        $this->article_count = $article_count;
        $art_this_blog = $articles->query("select * from articles where articles.uid = :uid order by articles.time desc",array(":uid"=>$usr_info['uid']));
        $this->art_this_blog = $art_this_blog;
        $comment = new model("comment");
        $com_this_user = $comment->query("select * from comments where comments.ret_user = :uid and comments.status = 0 order by comments.time desc",array(":uid"=>$usr_info['uid']));
        $this->com_this_user = $com_this_user;
        $com_user_added = $comment->query("select * from comments where comments.ret_user = :uid and comments.status = 1 order by comments.time desc",array(":uid"=>$usr_info['uid']));
        $this->com_user_added = $com_user_added;
    }
    public function actionEdit(){
        if($this->islogin){
            $usr_info = getuserinfo($_SESSION["UID"]);
        }else {
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        if(arg("aid")==0) {
            $article_title = "silence is golden.";
            $article_text = "Practise makes perfect.";
        }
        else {
            $articles = new model("articles");
            $article_show = $articles->query("select title,text from articles where articles.aid=:aid",array(":aid"=>arg("aid")));
            $article_title = $article_show[0]["title"];
            $article_text = $article_show[0]["text"];
        }
        $this->article_title = $article_title;
        $this->article_text = $article_text;
        $this->aid=arg('aid');
    }
}