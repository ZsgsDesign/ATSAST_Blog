<?php
$keywords = 0;
class SearchController extends BaseController{
    public function actionIndex()
    {
        global $keywords;
        $keywords = arg("keywords");
    }
    public function actionResult() {
        require_once(APP_DIR.'/protected/include/functions.php');
        global $keywords;
        $keywords = arg("keywords");
        if (!$keywords) {
        ERR::Catcher(9002);
        }
        if(!self::are_keywords_legal($keywords)){
            ERR::Catcher(9201);
        }
        $users= new model("users");
        $articles=new Model('articles');
        $users_found = $users->query("select username,email from users where username like :username",array(":username"=>'%'.$keywords.'%'));
        $result=$articles->query('select title,text from articles where title like :title or text like :text', array(":title"=>'%'.$keywords.'%',':text'=>'%'.$keywords.'%'));
        $gravatar=[];
        if(count($users_found)!=0){
            foreach ($users_found as $user){
                $gravatar[$user["username"]] = getgravatar($user['email']);
            }
        }
        $this->avatar = $gravatar;
        $this->search_result = $result;
        $this->users_found = $users_found;
        $this->keywords = $keywords;
    }
    public function are_keywords_legal($path)
    {
        $pattern="/[ '.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/";
        if(preg_match($pattern, $path)) return false;
        return true;
    }
}