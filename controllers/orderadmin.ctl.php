<?php
require_once('modules/db.php');
require_once('models/orderadmin.model.php');

class orderadminController{
    private static orderadminModel $orderadminModel;
    
    private static function init(): void
    {
        self::$orderadminModel = new orderadminModel(DB());
    }

    public static function Render(): void
    {
        self::init();

        $dsdonhang = self::$orderadminModel->getorder();
        $dssanpham = array();

        if(!empty($dsdonhang))
        {
            foreach ($dsdonhang as $dsdh) {
                $ds = self::$orderadminModel->getdetailorder($dsdh->getMaDH());
                if(!empty($ds))
                {
                    foreach ($ds as $sp) {
                        array_push($dssanpham,$sp);
                    }
                }
            }
        }
        
        $title = 'Quản lý đơn hàng';
        $header = 'views/headeradmin.partial.php';
        $template = 'views/orderadmin.tmpl.php';

        require_once('views/layoutadmin.php');
    }

}