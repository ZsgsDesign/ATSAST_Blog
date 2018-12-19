<?php
class AccountController extends BaseController
{
    public function actionIndex() {
        if(isset($_SESSION["uid"])){
            $islogin = 1;
        }
        else{
            $islogin = 0;
        }
    }
    public function actionRegister() {
        $user = new model("user");
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        if(!isset($email)||!isset($pass)){
            die(json_encode([
                "error" => $ERR["1000"],
                "val" => 1,
            ]
            ));
        }
        else if(strlen($pass)<6){
            die(json_encode([
                "error" => $ERR["1001"],
                "val" => 1,
            ]
            ));
        }
        else if(strlen($pass)>20){
            die(json_encode([
                "error" => $ERR["1002"],
                "val" => 1,
            ]
            ));
        }
    }
}
