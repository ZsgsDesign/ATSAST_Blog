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
        require(APP_DIR.'/protected/lib/error.php');
    }
}
