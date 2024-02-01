<?php
require_once('modules/db.php');
require_once('models/order.model.php');
class OrderController
{
    private static orderModel $ordermodel;

    private static function init():void
    {
        self::$ordermodel = new orderModel(DB());
    }
    public static function Render():void
    {
        self::init();

        $makh = $_GET['MaKH']??='';
        $magh = $_GET['MaGH']??='';
        if($magh !='' && $makh !='')
        {
            $khachhang=self::$ordermodel->getInfoCustomer($makh);
            $cart = self::$ordermodel->getProductinCart($magh);

            $tongtien=0;

            foreach($cart as $ca)
            {
                $tongtien+= intval($ca->getDonGia()) * intval($ca->getSoLuong());
            }
        }

        $title = 'Đặt Hàng';
        $header = '';
        $template = 'views/order.tmpl.php';
        $footer = '';
        require_once('views/layout.php');
    }
}