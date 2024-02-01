<?php
require_once('../modules/db.php');
require_once('../models/orderitem.model.php');

$orderitem = new orderitemModel(DB());

$makh = $_POST['makh']??'';
$magh = $_POST['magh']??'';
$name = $_POST['name']??'';
$number = $_POST['number']??'';
$email = $_POST['email']??'';
$method = $_POST['method']??'';
$address = $_POST['address']??'';
$total = $_POST['total']??'';

if($name !='' && $number !='' && $email !='' && $method !='' && $address !='' && $total !='')
{
    $check= $orderitem->insertOrder($makh,$name,$email,$number,$address,$method,$total);

    if($check)
    {
        $madh=$orderitem->getIDOrder($makh);
        $products = $orderitem->getProductinCart($magh);
        
        foreach($products as $product)
        {
            $orderitem->insertOrderDetail($madh,$product->getMaSP(),$product->getTenSP(), $product->getKichThuoc(), $product->getSoLuong(), $product->getDonGia());

            $soluong =intval($product->getSoLuongToiDa()) - intval($product->getSoLuong());
            $idSize = $orderitem->getIDSize($product->getKichThuoc());
            $orderitem->minusQuantityProduct($idSize, $product->getMaSP(), $soluong);
        }
        
        $orderitem->deleteProductinCartDetail();
        header("Location: /cuahangthoitrang/cart.php?msg=done-order");
    }
}
