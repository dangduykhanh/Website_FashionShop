<?php
require_once(DIR_BASE . 'modules/db.php');
require_once(DIR_BASE . 'models/sanpham.model.php');
require_once(DIR_BASE . 'models/danhmuc.model.php');
require_once(DIR_BASE . 'models/hinhanh.model.php');
require_once(DIR_BASE . 'models/kichthuoc.model.php');

class DetailController
{
    private static sanphamModel $sanphamModel;
    private static danhmucModel $danhmucModel;
    private static hinhanhModel $hinhanhModel;
    private static kichthuocModel $kichthuocModel;

    private static function init(): void{
        self::$sanphamModel = new sanphamModel(DB());
        self::$danhmucModel = new danhmucModel(DB());
        self::$hinhanhModel = new hinhanhModel(DB());
        self::$kichthuocModel = new kichthuocModel(DB());
    }

    public static function Render(): void{
        self:: init();
        
        if(isset($_GET["id"]) &&!empty($_GET["id"]))
        {
            $sanpham = self::$sanphamModel->get($_GET["id"]);
            $danhmuc = self::$danhmucModel->getProductsTagsName($sanpham->getMaSP());
            $anhs = self::$hinhanhModel->getImagesNotThumbnail($sanpham->getMaSP());
            $kichthuoc = self::$kichthuocModel->getSizeQuantity($sanpham->getMaSP());  
            $sanphamlienquan = self::$sanphamModel->get4Products($danhmuc->getMaDM(), $sanpham->getMaSP());

            if(!empty($_GET["url"]))
            {
                $anhbia = $_GET["url"];
            }
            else
            {
                $anhbia = self::$hinhanhModel->getThumbnail($sanpham->getMaSP());
            }

            $title = $sanpham->getTenSP();
            $header = 'views/header.partial.php';
            $template ='views/detail.tmpl.php';
            $footer = 'views/footer.partial.php';
        }
        require_once('views/layout.php');
    }
}