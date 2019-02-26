<?php
/*
author:Brethland
*/
class PageController extends BaseController
{
    public function actionBlog() {
        require_once(APP_DIR.'/protected/include/functions.php');
        if(arg("uid")==null){
            $this->jump("<{$MAIN_PAGE}>");
        }
        $row = getuserinfo(arg("uid"));
        $this->blog_user = $row;
        $this->blog_uid = $row["uid"];
        $category = new model("category");
        $category_thisusr = $category->find(array("uid=:uid",":uid"=>$row["uid"]));
        $this->category_thisusr= $temp = explode(",",$category_thisusr["category"]);
        $articles = new model ("articles");
        $art_show = $articles->query("select * from articles where articles.uid=:uid and articles.isdraft = 0 order by articles.time desc",array(":uid"=>$row["uid"]));
        $this->art_show = $art_show;
        $article_ic = array();
        $article_ct=array();
        foreach ($temp as $cate){
            $article_ic[$cate] = $articles->query("select * from articles where articles.category=:category and articles.uid=:uid",array(":category"=>$cate,":uid"=>$row["uid"]));
            $article_ct[$cate] = count($article_ic[$cate]);
        }
        $this->article_ic = $article_ic;
        $this->article_ct = $article_ct;
        if(arg("cate")!=null){
            $this->catenow = arg("cate");
        }
        else{
            $this->catenow = null;
        }
    }
    public function actionArticle() {
        require_once(APP_DIR.'/protected/include/functions.php');
        if(arg("uid")==null || arg("aid")==null){
            $this->jump("<{$this->MAIN_PAGE}>");
        }
        $row = getuserinfo(arg("uid"));
        $this->blog_user = $row;
        $this->blog_uid = $row["uid"];
        $articles = new model ("articles");
        $art_s = $articles->query("select * from articles where articles.uid=:uid and articles.isdraft = 0 and articles.aid=:aid order by articles.time desc",array(":uid"=>$row["uid"],":aid"=>arg("aid")));
        $this->art_sp = $art_s[0];
        $comments = new model ("comments");
        $com_sp = $comments->query("select * from comments where comments.ret_article=:aid and comments.status = 1 order by comments.rate_up desc",array(":aid"=>arg("aid")));
        $this->com_sp = $com_sp;
    }
}