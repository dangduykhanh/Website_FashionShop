<?php
require_once('modules/db.php');
require_once('models/customer.model.php');

class customerController{
    private static customerModel  $customerModel;
    
    private static function init(): void
    {
        self::$customerModel = new customerModel(DB());
    }

    public static function Render(): void
    {
        self::init();

        $dstaikhoan = self::$customerModel->getaccountcustomer();

        $title = 'Quản lý khách hàng';
        $header = 'views/headeradmin.partial.php';
        $template = 'views/customer.tmpl.php';

        require_once('views/layoutadmin.php');
    }

}