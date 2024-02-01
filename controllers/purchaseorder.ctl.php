<?php
require_once('modules/db.php');
require_once('models/purchaseorder.model.php');

class PurchaseOrderController
{
    private static PurchaseOrderModel $PurchaseOrderModel;

    private static function init():void
    {
        self::$PurchaseOrderModel = new PurchaseOrderModel(DB());
    }

    public static function Render() {
        self::init();

        $makh = $_SESSION['user']['MaKH']??'';

        if(isset($_SESSION['user']))
        {
            $donhangs = self::$PurchaseOrderModel->getPurchaseOrder($makh); 
            
            $listsanphamchitiet = array();

            foreach($donhangs as $dh)
            {
                $sanphamdonhangs = self::$PurchaseOrderModel->getProductinPucharseOrderDetail($dh->getMaDH());

                if(!empty($sanphamdonhangs))
                {
                    foreach ($sanphamdonhangs as $sanphamdh) {
                        array_push($listsanphamchitiet, $sanphamdh);
                    }
                }
            }

            

        }

        $title = 'Đơn Hàng';
        $header = 'views/header.partial.php';
        $template = 'views/purchaseorder.tmpl.php';
        $footer = '';

        require_once('views/layout.php');
        
    }
}
