<?php

class BaseController extends Controller
{
    public $layout = "layout.html";
    public function init()
    {
        
        if (!session_id()) {
            session_start();
        }

        header("Content-type: text/html; charset=utf-8");
        require(APP_DIR.'/protected/include/functions.php');
        require(APP_DIR.'/protected/model/ERR.php');
        $this->islogin=is_login();
        $this->MAIN_PAGE = $_SERVER["HTTP_HOST"];
        if(isset($_SESSION['UID'])) {
            $row = getuserinfo($_SESSION["UID"]);
            $this->user_name = $row["username"];
            $this->user_info = $row;
        }
        if(isset($_SESSION['UID'])){
            $row = getuserinfo($_SESSION["UID"]);
            $this->gravatar = getgravatar($row["email"]);
        }
        $current_hour=date("H");
        if ($current_hour<5) {
            $this->greeting="晚安";
        } elseif ($current_hour<11) {
            $this->greeting="早安";
        } elseif ($current_hour<18) {
            $this->greeting="午安";
        } elseif ($current_hour<22) {
            $this->greeting="晚上好";
        } else {
            $this->greeting="夜深了";
        }
    }
    public function jump($url, $delay = 0)
    {
        echo "<html><head><meta http-equiv='refresh' content='{$delay};url=http://{$url}'></head><body></body></html>";
        exit;
    }
}
