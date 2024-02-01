<?php
require_once('../models/productadmin.model.php');
require_once('../modules/db.php');
require_once('../modules/helpers.php');

$productadminModel = new productadminModel(DB());

$category = $_POST['category']??'';
$nameproduct = $_POST['nameproduct']??'';
$pricein = $_POST['pricein']??'';
$priceout = $_POST['priceout']??'';
$gender = $_POST['gender']??'';
$detailproduct = $_POST['detailproduct']??'';

$size1 = $_POST['size1']??'';
$size2 = $_POST['size2']??'';
$size3 = $_POST['size3']??'';
$size4 = $_POST['size4']??'';
$size5 = $_POST['size5']??'';

$idproduct = $_GET['masp']??'';

if(!empties($category, $nameproduct, $pricein, $priceout, $gender, $size1, $size2, $size3, $size4, $size5, $detailproduct))
{
        $vaild = $productadminModel->insertProduct($category,$nameproduct,$pricein, $priceout, $detailproduct, $gender);
        $masp = $productadminModel->getMaSP($category);

        $vaild = $vaild && $productadminModel->uploadAndSaveToDatabase($_FILES['imagethumbnail'],$masp,1) && 
        $productadminModel->uploadAndSaveToDatabase($_FILES['image2'],$masp,0) 
        && $productadminModel->uploadAndSaveToDatabase($_FILES['image3'],$masp,0);

        $dskichthuoc = $productadminModel->getMaKT($category);

        $vaild= $vaild && $productadminModel->insertSizeProdouct($dskichthuoc[0],$masp,$size1) 
        && $productadminModel->insertSizeProdouct($dskichthuoc[1],$masp,$size2) 
        && $productadminModel->insertSizeProdouct($dskichthuoc[2],$masp,$size3) 
        && $productadminModel->insertSizeProdouct($dskichthuoc[3],$masp,$size4) 
        && $productadminModel->insertSizeProdouct($dskichthuoc[4],$masp,$size5);
        if($vaild)
        {
            header('Location: /cuahangthoitrang/productadmin.php?msg=insertdone-product');  
        }
}
elseif(!empty($idproduct))
{
    $productadminModel->deleteproduct($idproduct);
    header('Location: /cuahangthoitrang/productadmin.php?msg=deletedone-product');
}