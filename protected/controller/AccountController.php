<?php
/*
author:Zhouhui
*/
class AccountController extends BaseController
{
    public function actionIndex() {
        $users = new model("users");
        if(arg("action") == "login"){
            $name=arg('username');
            $pwd=arg('password');
                if($name==''){
                    echo "<script>alert('请输入用户名');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
                    exit;
                }
                if($pwd==''){
                    echo "<script>alert('请输入密码');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
                    exit;
                }
                $row = $users->find(array("username=:username",":username"=>$name));
                if($row) {
                    if($pwd !=$row['password']){
                        echo "<script>alert('密码错误，请重新输入');location='http://{$this->MAIN_PAGE}/account/'</script>";
                        exit;
                    }
                    else{
                        $_SESSION['UID']=$row['uid'];
                        echo "<script>alert('登录成功');location='http://{$this->MAIN_PAGE}/'</script>";
                    }
                }else{
                    echo "<script>alert('您输入的用户名不存在');location='http://{$this->MAIN_PAGE}/account/'</script>";
                    exit;
                };
            }
            else if(arg("action") == "register"){
                $name=arg('username');
                $pwd=arg('password');
                $pwdconfirm=arg('pwdconfirm');
                $email = arg('email');
                if($name==''){
                    echo"<script>alert('你的用户名不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
                    exit;
                }
                if($pwd==''){
                    echo"<script>alert('你的密码不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
                    exit;
                }
                if($email==''){
                    echo"<script>alert('你的邮箱不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
                    exit;
                }
                if($pwd != $pwdconfirm){
                    echo"<script>alert('你输入的两次密码不一致，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
                    exit;
                }
                $row = $users->find(array("username=:username",":username"=>$name));
                if($row){
                    echo "<script>alert('您输入的用户名已存在,请登录！');location='http://{$this->MAIN_PAGE}/account/'</script>";
                    exit;
                }else {
                    $nowuid = $users->query("select max(uid) from users");
                    $new_usr = array(
                        "uid" => $nowuid[0]['max(uid)']+1,
                        "username" => $name,
                        "password" => $pwd,
                        "email" => $email,
                    );
                    $cate = array(
                        "uid"=>$new_usr["uid"]
                    );
                    $category = new model ("category");
                    $category->create($cate);
                    $users->create($new_usr);
                    $_SESSION["UID"] = $nowuid[0]['max(uid)']+1;
                    echo "<script>alert('您已注册成功');location='http://{$this->MAIN_PAGE}/'</script>";
                    exit;
                }
            }
        }
    public function actionLogout() {
        session_unset();
        session_destroy();
        $this->jump("{$this->MAIN_PAGE}/");
    }
}
