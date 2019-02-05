<?php
class AdminController extends BaseController 
{
    public function actionIndex() {
        $now_blog = $_SESSION["BLOGID"];
        if($this->islogin){
            $usr_info = getuserinfo($_SESSION["OPENID"]);
            $is_homeuser = $usr_info->find(array("uid = :uid and type = blog_id and type_value = :now_blog",":uid"=>$usr_info["uid"],":now_blog"=>$now_blog));
            if($is_homeuser){
                ;
            }else {
                $ret = "你不是本博客的管理员！";
                return json_encode($ret);
            }
        }else {
            return $this->jump("{$this->LOGIN_PAGE}/");
        }
        $articles = new model("articles");
        $art_this_blog = $articles->query("select * from articles where articles.blog_id = :now_blog",array(":now_blog"=>$now_blog));
        $this->art_this_blog = $art_this_blog;
        $comment = new model("comment");
        $com_this_user = $comment->query("select * from comment where comment.ret_user = :uid",array(":uid"=>$usr_info["uid"]));
        $this->com_this_user = $com_this_user;
    }
    public function actionNewArticle() {
        $articles = new model("articles");
        $article_written = $_GET["article"];
        if($_GET["articlestatus"] == 1) {
            $articles->update(array("text = :txt",":txt"=>$article_written),array("author = :author",":author"=>$usr_info["name"]),array("time = :time",":time"=>date('Y-m-d H:i:s',time())),array("isdraft = :isdraft",":isdraft"=>1));
            $ret =  "保存草稿成功";
            return json_encode($ret);
        } else {
            $articles->update(array("text = :txt",":txt"=>$article_written),array("author = :author",":author"=>$usr_info["name"]),array("time = :time",":time"=>date('Y-m-d H:i:s',time())),array("isdraft = :isdraft",":isdraft"=>0));
            $ret =  "发布成功";
            return json_encode($ret);
        }
    }
}