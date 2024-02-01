<?php
require_once('modules/db.php');
require_once('models/cart.model.php');
class CartController
{
    private static CartModel $carModel;

    private static function init():void
    {
        self::$carModel = new CartModel(DB());
    }

    public static function Render(): void
    {
        self::init();
        $emti = 'alertempty';

        if(!isset($_SESSION['user']) && isset($_POST['from'])!='detail')
        {
            $title = 'Giỏ Hàng';
            $header = 'views/header.partial.php';
            $template = 'views/cart.tmpl.php';
            $footer = '';
        }
        elseif(!isset($_SESSION['user']) && isset($_POST['from'])=='detail')
        {

            $url = $_POST['Urldetail'] ?? "";
            $masp = $_POST['MaSPdetail'] ?? "";
            $size = $_POST['Sizedetail'] ?? "";
            $quantity = $_POST['Quantitydetail'] ?? "";
            $quantitymax = $_POST['QuantitydetailMax'] ?? "";

            if($url !='' && $masp !='' && $size !='' && $quantity !='')
            {
                if(!isset($_SESSION['productnotlogin']))
                {
                    $_SESSION['productnotlogin'] = array();
                }

                $isupdate = false;

                if (!empty($_SESSION['productnotlogin'])) {

                    if (!$isupdate) {
                        foreach ($_SESSION['productnotlogin'] as $sanpham) {
                            if ($sanpham->getMaSP() == $masp) {
                               
                                $sanpham->setUrl($url);
                                $sizepro = self::$carModel->getSizeName($size);
                                $sanpham->setKichThuoc($sizepro);
                                $sanpham->setSoLuong($quantity);
                                $sanphamcart = self::$carModel->getProductCart($masp);
                                $thanhtien = intval($quantity) * intval($sanpham->getDonGia());
                                $sanpham->setThanhTien($thanhtien);
                                $isupdate = true; // Set flag to true for URL update
                                break; // Exit the loop
                            }
                        }
                    }
                }
        
                if($isupdate)
                {
                    header('Location: /cuahangthoitrang/cart.php?msg=update-favorite');
                }
                else {
                    // Continue with adding the product to the session
                    $sanphamcart = self::$carModel->getProductCart($masp);
                    $sizeproduct = self::$carModel->getSizeName($size);
                    $thanhtien = intval($quantity) * intval($sanphamcart['DonGiaBan']);
        
                    $sanphamchitiet = new chitietgiohangsession('', $masp, $sanphamcart['TenSP'], $url, $sizeproduct, $quantity, $quantitymax, $sanphamcart['DonGiaBan'], $thanhtien);
        
                    array_push($_SESSION['productnotlogin'], $sanphamchitiet);
        
                    $title = 'Giỏ Hàng';
                    $header = 'views/header.partial.php';
                    $template = 'views/cart.tmpl.php';
                    $footer = '';
                }

                // unset($_SESSION['productnotlogin']);  
            }  
            else
            {
                header('Location: /cuahangthoitrang/detail.php?msg=emptyproductcart&id='.$masp.'&url='.$url);
            }   
        }
        elseif(isset($_SESSION['user']) && (isset($_POST['from'])=='detail' || isset($_GET['from'])=='favorite'))
        {
            $url = $_POST['Urldetail'] ?? "";
            $masp = $_POST['MaSPdetail'] ?? "";
            $size = $_POST['Sizedetail'] ?? "";
            $quantity = $_POST['Quantitydetail'] ?? "";
            $quantitymax = $_POST['QuantitydetailMax'] ?? "";

            $urlget = $_GET['Urldetail'] ?? "";
            $maspget = $_GET['MaSPdetail'] ?? "";
            $sizeget = $_GET['Sizedetail'] ?? "";
            $quantityget = $_GET['Quantitydetail'] ?? "";
            $quantitymaxget = $_GET['QuantitydetailMax'] ?? "";

            if(($url !='' && $masp !='' && $size !='' && $quantity !=''))
            {
                $MaGH = self::$carModel->getMaGH($_SESSION['user']['MaKH']);
                $sanphams = self::$carModel->getProductForMaGH($MaGH['MaGH']);

                if(isset($_SESSION['productnotlogin']) &&  !empty($_SESSION['productnotlogin']) && !empty($sanphams))
                {
                    foreach ($_SESSION['productnotlogin'] as $pro) {
                        $chek=true;
                        foreach ($sanphams as $sp) {
                            if($pro->getMaSP()==$sp->getMaSP())
                            {
                            $chek=false;
                            self::$carModel->updateStylePr($sp->getMaSP(), $MaGH['MaGH'],$pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), intval($pro->getSoLuong()) * intval($pro->getDonGia()));
                            $sp->setUrl($pro->getUrl());
                            $sp->setKichThuoc($pro->getKichThuoc());
                            $sp->setSoLuong($pro->getSoLuong());
                            $sp->setSoLuongToiDa($pro->getSoLuongLon());
                            $sp->setThanhTien(intval($pro->getSoLuong()) * intval($pro->getDonGia()));
                            break;
                            }
                    }
                    
                    if($chek)
                        {
                            self::$carModel->insertCartDetail($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia());
                            $sanpham = new chitietgiohang($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia(), $pro->getThanhTien());
                            array_push($sanphams,$sanpham);
                        }
                    }

                    unset($_SESSION['productnotlogin']);
                }
                elseif(isset($_SESSION['productnotlogin']) &&  !empty($_SESSION['productnotlogin']))
                {
                foreach ($_SESSION['productnotlogin'] as $pro) {

                    self::$carModel->insertCartDetail($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia());
                    $sanpham = new chitietgiohang($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia(), $pro->getThanhTien());
                    array_push($sanphams,$sanpham);
                }
                unset($_SESSION['productnotlogin']);
                }

                if(!empty($sanphams))
                {
                    foreach($sanphams as $sanpham)
                    {
                        if($sanpham->getMaSP() == $masp)
                        {
                            $siz = self::$carModel->getSizeName($size);
                            self::$carModel->updateStylePr($masp, $MaGH['MaGH'], $url, $siz, $quantity, $quantitymax, intval($quantity) * intval($sanpham->getDonGia())  );
                            header('Location: /cuahangthoitrang/cart.php?msg=update-favorite');
                        }
                    }
                }

                $sanphamcart = self::$carModel->getProductCart($masp);
                $sizeproduct = self::$carModel->getSizeName($size);
                
                self::$carModel->insertCartDetail($MaGH['MaGH'], $masp, $sanphamcart['TenSP'], $url,$sizeproduct,$quantity,$quantitymax,  $sanphamcart['DonGiaBan']);
                
                $sanphams = self::$carModel->getProductForMaGH($MaGH['MaGH']);

                $title = 'Giỏ Hàng';
                $header = 'views/header.partial.php';
                $template = 'views/cart.tmpl.php';
                $footer = '';
            }
            elseif($urlget !='' && $maspget != '' && $sizeget != '' && $quantityget !='')
            {
                $MaGH = self::$carModel->getMaGH($_SESSION['user']['MaKH']);
                $sanphams = self::$carModel->getProductForMaGH($MaGH['MaGH']);

                if(!empty($sanphams))
                {
                    foreach($sanphams as $sanpham)
                    {
                        if($sanpham->getMaSP() == $maspget)
                        {
                            self::$carModel->updateStylePr($maspget, $MaGH['MaGH'], $urlget, $sizeget, $quantityget, $quantitymaxget, intval($quantityget) * intval($sanpham->getDonGia()));
                            header('Location: /cuahangthoitrang/cart.php?msg=addfrom-favorite');
                        }
                    }
                }

                $sanphamcart = self::$carModel->getProductCart($maspget);
                $sizeproduct = $sizeget;
                
                self::$carModel->insertCartDetail($MaGH['MaGH'], $maspget, $sanphamcart['TenSP'], $urlget, $sizeproduct, $quantityget, $quantitymaxget,  $sanphamcart['DonGiaBan']);
                $sanphams = self::$carModel->getProductForMaGH($MaGH['MaGH']);
                
                $title = 'Giỏ Hàng';
                $header = 'views/header.partial.php';
                $template = 'views/cart.tmpl.php';
                $footer = '';
            }
            else
            {
                header('Location: /cuahangthoitrang/detail.php?msg=emptyproductcart&id='.$_POST['MaSPdetail'].'&url='.$url);
            }    
        }
        else
        {
            $MaGH = self::$carModel->getMaGH($_SESSION['user']['MaKH']);
            $sanphams = self::$carModel->getProductForMaGH($MaGH['MaGH']);

            
            if(isset($_SESSION['productnotlogin']) &&  !empty($_SESSION['productnotlogin']) && !empty($sanphams))
            {
                foreach ($_SESSION['productnotlogin'] as $pro) {
                    $chek=true;
                    foreach ($sanphams as $sp) {
                        if($pro->getMaSP()==$sp->getMaSP())
                        {
                            $chek=false;
                            self::$carModel->updateStylePr($sp->getMaSP(), $MaGH['MaGH'],$pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), intval($pro->getSoLuong()) * intval($pro->getDonGia()));
                            $sp->setUrl($pro->getUrl());
                            $sp->setKichThuoc($pro->getKichThuoc());
                            $sp->setSoLuong($pro->getSoLuong());
                            $sp->setThanhTien(intval($pro->getSoLuong()) * intval($pro->getDonGia()));
                            break;
                        }
                    }
                    
                    if($chek)
                    {
                        self::$carModel->insertCartDetail($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia());
                        $sanpham = new chitietgiohang($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia(), $pro->getThanhTien());
                        array_push($sanphams,$sanpham);
                    }
                    
                }

                unset($_SESSION['productnotlogin']);
            }
            elseif(isset($_SESSION['productnotlogin']) &&  !empty($_SESSION['productnotlogin']))
            {
                foreach ($_SESSION['productnotlogin'] as $pro) {

                    self::$carModel->insertCartDetail($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia());
                    $sanpham = new chitietgiohang($MaGH['MaGH'], $pro->getMaSP(), $pro->getTenSP(), $pro->getUrl(), $pro->getKichThuoc(), $pro->getSoLuong(), $pro->getSoLuongLon(), $pro->getDonGia(), $pro->getThanhTien());
                    array_push($sanphams,$sanpham);
                }
                unset($_SESSION['productnotlogin']);
            }

            $title = 'Giỏ Hàng';
            $header = 'views/header.partial.php';
            $template = 'views/cart.tmpl.php';
            $footer = '';
        }

        $count = (self::$carModel->getCountProductCart())??0;

        require_once('views/layout.php');
    }
}