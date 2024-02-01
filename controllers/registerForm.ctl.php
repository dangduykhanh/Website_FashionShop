<?php
class RegisterFormController
{
    public static function Render():void
    {
        $title = 'Đăng Ký';
        $header = '';
        $template = 'views/register.tmpl.php';
        $footer = '';
        require_once('views/layout.php');
    }
}