<?php
require_once('modules/db.php');
require_once('models/sanpham.model.php');

class IndexController{
    private static sanphamModel $sanphamModel;
    
    private static function init(): void
    {
        self::$sanphamModel = new sanphamModel(DB());
    }

    public static function Render(): void
    {
        self::init();

        $AoNams = self::$sanphamModel->getProducts('DM1','nam');
        $AoNus = self::$sanphamModel->getProducts('DM1','nu');

        $QuanNams = self::$sanphamModel->getProducts('DM2','nam');
        $QuanNus = self::$sanphamModel->getProducts('DM2','nu');

        $GiayNams = self::$sanphamModel->getProducts('DM3','nam');
        $GiayNus = self::$sanphamModel->getProducts('DM3','nu');

        $title = 'Trang chủ';
        $header = 'views/header.partial.php';
        $template = 'views/index.tmpl.php';
        $footer = 'views/footer.partial.php';

        require_once('views/layout.php');
    }

}