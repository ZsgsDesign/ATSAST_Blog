<?php
class AjaxController extends BaseController
{
    public function actionTempLogin()
    {
        session_destroy();
    }
}