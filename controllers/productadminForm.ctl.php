<?php
require_once('models/productadminForm.model.php');
require_once('modules/db.php');
class productadminFormController{

    private static productadminFormModel $productFormModel;

    private static function init():void
    {
        self::$productFormModel = new productadminFormModel(DB());
    }

    public static function Render(): void
    {
        self::init();

        $dsdanhmuc = self::$productFormModel->getcategory();
        $dssanpham = self::$productFormModel->getProduct();
        $dskichthuoc = self::$productFormModel->getSize();

        $dshinhanh = array();
        $dssoluong = array();

        if(!empty($dssanpham))
        {
            foreach ($dssanpham as $sp) {
                $dsha = self::$productFormModel->getimage($sp->getMaSP());
                $dssl = self::$productFormModel->getquantity($sp->getMaSP());

                if(!empty($dsha))
                {
                    foreach ($dsha as $ha) {
                        array_push($dshinhanh, $ha);
                    }
                }

                if(!empty($dssl))
                {
                    foreach ($dssl as $sl) {
                        array_push($dssoluong, $sl);
                    }
                }
            }
        }

        
        $title = 'Quản lý sản phẩm';
        $header = 'views/headeradmin.partial.php';
        $template = 'views/productadmin.tmpl.php';
        
        require_once('views/layoutadmin.php');
              
    }
}