<?php
require_once('modules/db.php');
require_once('models/shop.model.php');

class ShopController
{
    private static shopModel $shopModel;

    private static function init(): void
    {
        self::$shopModel = new shopModel(DB());
    }

    public static function Render()
    {
        self::init();
        $page = isset($_GET['page']) ? intval($_GET['page']):1;
        

        if(isset($_GET['MaDM']))
        {
            $So_SP_TREN_TRANG = 8;
            $from = ($page-1)*$So_SP_TREN_TRANG;
            $total = ceil(self::$shopModel->getTotalProduct($_GET['MaDM'])/$So_SP_TREN_TRANG);
            $sanphamAll = self::$shopModel->getAllProduct($_GET['MaDM'],$from,$So_SP_TREN_TRANG);
        }
        elseif(isset($_GET['category']) && isset($_GET['gender']) && isset($_GET['price']))
        {
            $So_SP_TREN_TRANG = 6;
            $from = ($page-1)*$So_SP_TREN_TRANG;
            if(intval($_GET['price'])==100)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],$_GET['gender'],'<=',1000000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],$_GET['gender'],'<=',1000000,'',$from,$So_SP_TREN_TRANG);
            }
            elseif(intval($_GET['price'])==115)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],$_GET['gender'],'',1000000,1500000)/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],$_GET['gender'],'',1000000,1500000,$from,$So_SP_TREN_TRANG);
            }
            else
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],$_GET['gender'],'>=',1500000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],$_GET['gender'],'>=',1500000,'',$from,$So_SP_TREN_TRANG);
            }
        }
        elseif(isset($_GET['category']) && isset($_GET['gender']))
        {
            $So_SP_TREN_TRANG = 6;
            $from = ($page-1)*$So_SP_TREN_TRANG;
            
            $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],$_GET['gender'],'','','')/$So_SP_TREN_TRANG);
            $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],$_GET['gender'],'','','',$from,$So_SP_TREN_TRANG);
        }
        elseif(isset($_GET['category']) && isset($_GET['price']))
        {
            $So_SP_TREN_TRANG = 6;
            $from = ($page-1)*$So_SP_TREN_TRANG;

            if(intval($_GET['price'])==100)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],'','<=',1000000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],'','<=',1000000,'',$from,$So_SP_TREN_TRANG);
            }
            elseif(intval($_GET['price'])==115)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],'','',1000000,1500000)/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],'','',1000000,1500000,$from,$So_SP_TREN_TRANG);
            }
            else
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],'','>=',1500000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],'','>=',1500000,'',$from,$So_SP_TREN_TRANG);
            }
        }
        elseif(isset($_GET['price']) && isset($_GET['gender']))
        {
            $So_SP_TREN_TRANG = 6;
            $from = ($page-1)*$So_SP_TREN_TRANG;

            if(intval($_GET['price'])==100)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct('',$_GET['gender'],'<=',1000000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition('',$_GET['gender'],'<=',1000000,'',$from,$So_SP_TREN_TRANG);
            }
            elseif(intval($_GET['price'])==115)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct('',$_GET['gender'],'',1000000,1500000)/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition('',$_GET['gender'],'',1000000,1500000,$from,$So_SP_TREN_TRANG);
            }
            else
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct('',$_GET['gender'],'>=',1500000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition('',$_GET['gender'],'>=',1500000,'',$from,$So_SP_TREN_TRANG);
            }
        }
        elseif(isset($_GET['category']))
        {
            $So_SP_TREN_TRANG = 6;
            $from = ($page-1)*$So_SP_TREN_TRANG;

            $total = ceil(self::$shopModel->getTotalConditionProduct($_GET['category'],'','','','')/$So_SP_TREN_TRANG);
            $sanphamAll = self::$shopModel->getProductAllCondition($_GET['category'],'','','','',$from,$So_SP_TREN_TRANG);
        }
        elseif(isset($_GET['gender']))
        {
            $So_SP_TREN_TRANG = 6;
            $from = ($page-1)*$So_SP_TREN_TRANG;

            $total = ceil(self::$shopModel->getTotalConditionProduct('',$_GET['gender'],'','','')/$So_SP_TREN_TRANG);
            $sanphamAll = self::$shopModel->getProductAllCondition('',$_GET['gender'],'','','',$from,$So_SP_TREN_TRANG);
        }
        elseif(isset($_GET['price']))
        {
            $So_SP_TREN_TRANG = 6;
            $from = ($page-1)*$So_SP_TREN_TRANG;
            if(intval($_GET['price'])==100)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct('','','<=',1000000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition('','','<=',1000000,'',$from,$So_SP_TREN_TRANG);
            }
            elseif(intval($_GET['price'])==115)
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct('','','',1000000,1500000)/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition('','','',1000000,1500000,$from,$So_SP_TREN_TRANG);
            }
            else
            {
                $total = ceil(self::$shopModel->getTotalConditionProduct('','','>=',1500000,'')/$So_SP_TREN_TRANG);
                $sanphamAll = self::$shopModel->getProductAllCondition('','','>=',1500000,'',$from,$So_SP_TREN_TRANG);
            }
        }
        else
        {
            $So_SP_TREN_TRANG = 12;
            $from = ($page-1)*$So_SP_TREN_TRANG;

            $total = ceil(self::$shopModel->getTotalProduct('')/$So_SP_TREN_TRANG);
            $sanphamAll = self::$shopModel->getAllProduct('',$from,$So_SP_TREN_TRANG);
        }


        $title = 'Cửa Hàng';
        $header = 'views/header.partial.php';
        $template = 'views/shop.tmpl.php';
        $footer = 'views/footer.partial.php';
        require_once('views/layout.php');
    }
}