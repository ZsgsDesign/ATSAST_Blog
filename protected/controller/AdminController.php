<?php
/*
author:Brethland
*/
class AdminController extends BaseController 
{
    public function actionIndex() {
        if($this->islogin){
            $usr_info = getuserinfo(arg("UID"));
        }else {
            $this->jump("{$this->MAIN_PAGE}/account/");
        }
        $this->usr_info = $usr_info;
        $articles = new model("articles");
        $art_this_blog = $articles->query("select * from articles where articles.uid = :uid and isdraft = 0 order by articles.time desc",array(":uid"=>$usr_info['uid']));
        $this->art_this_blog = $art_this_blog;
        $draft_this_blog = $articles->query("select * from articles where articles.uid = :uid and isdraft = 1 order by articles.time desc",array(":uid"=>$usr_info['uid']));
        $this->draft_this_blog = $draft_this_blog;
        $comment = new model("comment");
        $com_this_user = $comment->query("select * from comments where comments.ret_user = :uid order by comments.time desc",array(":uid"=>$usr_info['uid']));
        $this->com_this_user = $com_this_user;
    }
}