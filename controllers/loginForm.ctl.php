<?php
class loginFormController
{
    public static function Render():void
    {
        $title = 'Đăng Nhập';
        $header = '';
        $template = 'views/login.tmpl.php';
        $footer = '';

        require_once('views/layout.php');
    }
}