<?php
require_once('modules/db.php');
require_once('models/favorite.model.php');
require_once('modules/helpers.php');

class FavoriteController
{
    private static favoriteModel $favoriteModel;
    private static function init():void
    {
        self::$favoriteModel = new favoriteModel(DB());
    }

    public static function Render()
    {
        self::init();

        $emti = 'alertempty';

        if(!isset($_SESSION['user']) && isset($_POST['from'])!='favorite')
        {
            $title ='Yêu Thích';
            $header = 'views/header.partial.php';
            $template = 'views/favorite.tmpl.php';
            $footer = '';
        }
        elseif(!isset($_SESSION['user']) && isset($_POST['from'])=='favorite')
        {
            header('Location: /cuahangthoitrang/detail.php?msg=login-invaild&id='.$_POST['MaSPdetail']);
        }
        elseif(isset($_SESSION['user']) && isset($_POST['from'])=='favorite')
        {
            $url = $_POST['Urldetail'] ?? "";
            $masp = $_POST['MaSPdetail'] ?? "";
            $size = $_POST['Sizedetail'] ?? "";
            
            if($url !='' && $masp !='' && $size !='')
            {
                $MaYT = self::$favoriteModel->getMaYT($_SESSION['user']['MaKH']);
                $sanphams = self::$favoriteModel->getProductForMaYT($MaYT['MaYT']);

                if(!empty($sanphams))
                {
                    foreach($sanphams as $sanpham)
                    {
                        if($sanpham->getMaSP() == $masp)
                        {
                            $siz = self::$favoriteModel->getSizeName($size);
                            self::$favoriteModel->updateStylePr($masp, $MaYT['MaYT'], $url, $siz);
                            header('Location: /cuahangthoitrang/favorite.php?msg=update-favorite');
                            break;
                        }
                    }
                }

                $sanphamyeuthich = self::$favoriteModel->getProductFavorite($_POST['MaSPdetail']);
                $sizeproduct = self::$favoriteModel->getSizeName($_POST['Sizedetail']);
                
                self::$favoriteModel->insertFavoriteDetail($MaYT['MaYT'], $_POST['MaSPdetail'], $sanphamyeuthich['TenSP'], $_POST['Urldetail'],$sizeproduct, $sanphamyeuthich['DonGiaBan']);
                $sanphams = self::$favoriteModel->getProductForMaYT($MaYT['MaYT']);
                $title ='Yêu Thích';
                $header = 'views/header.partial.php';
                $template = 'views/favorite.tmpl.php';
                $footer = '';  
            }
            else
            {
                header('Location: /cuahangthoitrang/detail.php?msg=emptyproductfavorite&id='.$_POST['MaSPdetail'].'&url='.$url);
            }    
        }
        else
        {
            $MaYT = self::$favoriteModel->getMaYT($_SESSION['user']['MaKH']);
            $sanphams = self::$favoriteModel->getProductForMaYT($MaYT['MaYT']);

            if(empty($sanphams))
            {
                $emti=null;
            }

            $title ='Yêu Thích';
            $header = 'views/header.partial.php';
            $template = 'views/favorite.tmpl.php';
            $footer = '';  
        }

        require_once('views/layout.php');
    }
}