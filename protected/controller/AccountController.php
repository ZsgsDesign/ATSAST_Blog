<?php
class AccountController extends BaseController
{
    public function actionIndex() {
        $_SESSION["uid"] = 1;
    }
}
