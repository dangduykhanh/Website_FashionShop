<?php
require_once('modules/db.php');
require_once('models/admin.model.php');

class adminController{
    private static adminModel $adminModel;
    
    private static function init(): void
    {
        self::$adminModel = new adminModel(DB());
    }

    public static function Render(): void
    {
        self::init();

        $doanhthuthang = self::$adminModel->getrevenue(date('m'))??0;

        $doanhthu = 0;
        if( $doanhthuthang!= 0)
        {
            foreach ($doanhthuthang as $dt) {
                $doanhthu+= intval($dt->getTongTien());
            }
        }

        $donhangxuly = self::$adminModel->getOrderStatus('Đang xử lý')??0;
        $donhanghoanthanh = self::$adminModel->getOrderStatus('Đã hoàn thành')??0;
        $sanphamcontonkho = self::$adminModel->getproductmanage(1)??0;
        $sanphamhettonkho = self::$adminModel->getproductmanage(0)??0;
        $qlkhachhang = self::$adminModel->getcustomermanage()??0;
        $qlgopy = self::$adminModel->getfeedbackmanage()??0;

        $title = 'Thống kê';
        $header = 'views/headeradmin.partial.php';
        $template = 'views/admin.tmpl.php';

        require_once('views/layoutadmin.php');
    }

}