<?php
require_once('modules/db.php');
require_once('models/feedback.model.php');

class feedbackController{
    private static feedbackModel $feedbackmodel;
    
    private static function init(): void
    {
        self::$feedbackmodel = new feedbackModel(DB());
    }

    public static function Render(): void
    {
        self::init();

        $dsgopy = self::$feedbackmodel->getfeedback();

        $title = 'Quản Lý Góp ý';
        $header = 'views/headeradmin.partial.php';
        $template = 'views/feedback.tmpl.php';

        require_once('views/layoutadmin.php');
    }

}