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
        
    }
}