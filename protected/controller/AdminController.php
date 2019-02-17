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
    }
    public function actionBlog() {
        if($this->islogin){
            $usr_info = getuserinfo($_SESSION["UID"]);
        }else {
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $articles = new model("articles");
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
        if(arg("aid")==0){
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
    public function actionDelete() {
        
    }
}