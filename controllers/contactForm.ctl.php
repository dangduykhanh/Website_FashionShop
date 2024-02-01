<?php
class ContactController
{
    public static function Render()
    {
        $template = 'views/contact.tmpl.php';
        $header = 'views/header.partial.php';
        $title='Liên Hệ';
        $footer = 'views/footer.partial.php';

        require_once('views/layout.php');
    }
}