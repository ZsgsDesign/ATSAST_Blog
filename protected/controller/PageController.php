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
        $catagory = new model("catagory");
        $catagory_thisusr = $catagory->find(array("uid=:uid",":uid"=>$row["uid"]));
        $this->catagory_thisusr=explode(",",$catagory_thisusr["catagory"]);
        $articles = new model ("articles");
        $art_show = $articles->query("select * from articles where articles.uid=:uid and articles.isdraft = 0 order by articles.time desc",array(":uid"=>$row["uid"]));
        $this->art_show = $art_show;    
    }
    public function actionArticle() {
        
    }
}