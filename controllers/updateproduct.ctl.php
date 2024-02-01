<?php
require_once('modules/db.php');
require_once('models/updateproduct.model.php');

class updateproductController{
    private static updateproductModel $updateproductModel;
    
    private static function init(): void
    {
        self::$updateproductModel = new updateproductModel(DB());
    }

    public static function Render(): void
    {
        self::init();

        $idproduct = $_POST['idproduct']??'';
        $thumbnail = $_POST['thumbnail']??'';
        $category  = $_POST['category']??'';

        $idproductget = $_GET['idproduct']??'';
        $thumbnailget = $_GET['thumbnail']??'';
        $categoryget = $_GET['category']??'';

        if($idproduct !='' && $thumbnail !='' && $category != '')
        {
            $sanpham = self::$updateproductModel->getproduct($idproduct);
            $anhbia = $thumbnail;
            $danhmuc = self::$updateproductModel->getcategory($category);
            $soluong = self::$updateproductModel->getquantity($idproduct); 
            $kichthuoc = self::$updateproductModel->getSize();
            $hinhanh = self::$updateproductModel->getimage($idproduct);
        }
        elseif($idproductget !='' && $thumbnailget !='' && $categoryget != '')
        {
            $sanpham = self::$updateproductModel->getproduct($idproductget);
            $anhbia = $thumbnailget;
            $danhmuc = self::$updateproductModel->getcategory($categoryget);
            $soluong = self::$updateproductModel->getquantity($idproductget); 
            $kichthuoc = self::$updateproductModel->getSize();
            $hinhanh = self::$updateproductModel->getimage($idproductget);
        }

        

        $title = 'Cập nhật sản phẩm';
        $header = 'views/headeradmin.partial.php';
        $template = 'views/updateproduct.tmpl.php';

        require_once('views/layoutadmin.php');
    }

}