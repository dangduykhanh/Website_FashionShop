<?php
require_once('../models/updateproductitem.model.php');
require_once('../modules/db.php');

$updateproductitemModel = new updateproductitemModel(DB());

$hiddenimage1 = $_POST['hiddenimage1']??'';
$hiddenimage2= $_POST['hiddenimage2']??'';
$hiddenimage3 = $_POST['hiddenimage3']??'';

$a = $updateproductitemModel->isAbsolutePath($hiddenimage1);
$b = $updateproductitemModel->isAbsolutePath($hiddenimage2); 
$c = $updateproductitemModel->isAbsolutePath($hiddenimage3);

$idproduct = $_POST['idproduct']??'';
$category = $_POST['category']??'';
$thumbnail = $_POST['thumbnail']??'';
$nameproduct = $_POST['nameproduct']??'';
$pricein = $_POST['pricein']??'';
$priceout = $_POST['priceout']??'';
$gender = $_POST['gender']??'';
$details = $_POST['details']??'';

$size1 = $_POST['size1']??'';
$size2 = $_POST['size2']??'';
$size3 = $_POST['size3']??'';
$size4 = $_POST['size4']??'';
$size5 = $_POST['size5']??'';

$dskichthuoc = $updateproductitemModel->getSize($idproduct);
$dshinhanh = $updateproductitemModel->getimage($idproduct);

if($a && $b && $c)
{
    $vaild =$updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender)
    
    && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1)
    && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
    && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
    && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
    && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

    if($vaild)
    {
        header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
    }
    else{
        header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
    }
}
elseif ($a && $b)
{
    if(!empty($_FILES['image3']))
    {
        if($updateproductitemModel->checkfile($_FILES['image3']))
        {
            $vaild = $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image3'], $dshinhanh[2] , $idproduct, 0) 
            && $updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender);
        
            $vaild = $vaild && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1) 
            && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
            && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
            && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
            && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

            if($vaild)
            {
                header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
            }
            else{
                header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
            }
        }
        else
        {
            header('Location:/cuahangthoitrang/updateproduct.php?msg=loadfail-file&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
        }  
    }   
}
elseif ($a && $c)
{
    if(!empty($_FILES['image2']))
    {
        if($updateproductitemModel->checkfile($_FILES['image2']))
        {
            $vaild = $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image2'], $dshinhanh[1] , $idproduct, 0) 
            && $updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender);
        
            $vaild = $vaild && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1) 
            && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
            && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
            && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
            && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

            if($vaild)
            {
                header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
            }
            else{
                header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
            }
        }
        else
        {
            header('Location:/cuahangthoitrang/updateproduct.php?msg=loadfail-file&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
        }  
    }   
}
elseif ($b && $c)
{
    if(!empty($_FILES['image1']))
    {
        if($updateproductitemModel->checkfile($_FILES['image1']))
        {
            $vaild = $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image1'], $dshinhanh[0] , $idproduct, 1) 
            && $updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender);
        
            $vaild = $vaild && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1) 
            && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
            && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
            && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
            && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

            if($vaild)
            {
                header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
            }
            else{
                header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
            }
        }
        else
        {
            header('Location:/cuahangthoitrang/updateproduct.php?msg=loadfail-file&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
        }  
    }
}
elseif ($a)
{
    if(!empty($_FILES['image2']) && !empty($_FILES['image3']))
    {
        if($updateproductitemModel->checkfile($_FILES['image2']) && $updateproductitemModel->checkfile($_FILES['image3']))
        {
            $vaild = $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image2'], $dshinhanh[1] , $idproduct, 0)
            && $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image3'], $dshinhanh[2] , $idproduct, 0) 
            && $updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender);
        
            $vaild = $vaild && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1) 
            && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
            && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
            && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
            && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

            if($vaild)
            {
                header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
            }
            else{
                header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
            }
        }
        else
        {
            header('Location:/cuahangthoitrang/updateproduct.php?msg=loadfail-file&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
        }  
    }
}
elseif ($b)
{
    if(!empty($_FILES['image1']) && !empty($_FILES['image3']))
    {
        if($updateproductitemModel->checkfile($_FILES['image1']) && $updateproductitemModel->checkfile($_FILES['image3']))
        {
            $vaild = $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image1'], $dshinhanh[0] , $idproduct, 1)
            && $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image3'], $dshinhanh[2] , $idproduct, 0) 
            && $updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender);
        
            $vaild = $vaild && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1) 
            && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
            && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
            && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
            && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

            if($vaild)
            {
                header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
            }
            else{
                header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
            }
        }
        else
        {
            header('Location:/cuahangthoitrang/updateproduct.php?msg=loadfail-file&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
        }  
    }
}
elseif ($c)
{
    if(!empty($_FILES['image2']) && !empty($_FILES['image1']))
    {
        if($updateproductitemModel->checkfile($_FILES['image2']) && $updateproductitemModel->checkfile($_FILES['image1']))
        {
            $vaild = $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image2'], $dshinhanh[1] , $idproduct, 0)
            && $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image1'], $dshinhanh[0] , $idproduct, 1) 
            && $updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender);
        
            $vaild = $vaild && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1) 
            && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
            && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
            && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
            && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

            if($vaild)
            {
                header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
            }
            else{
                header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
            }
        }
        else
        {
            header('Location:/cuahangthoitrang/updateproduct.php?msg=loadfail-file&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
        }  
    }
}
else
{
    if(!empty($_FILES['image1']) && !empty($_FILES['image2']) && !empty($_FILES['image3']))
    {
        if($updateproductitemModel->checkfile($_FILES['image1']) && $updateproductitemModel->checkfile($_FILES['image2']) && $updateproductitemModel->checkfile($_FILES['image3']))
        {
            $vaild = $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image1'], $dshinhanh[0] , $idproduct, 1)
            && $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image2'], $dshinhanh[1] , $idproduct, 0)
            && $updateproductitemModel->uploadAndSaveToDatabase($_FILES['image3'], $dshinhanh[2] , $idproduct, 0) 
            && $updateproductitemModel->updateproduct($idproduct, $nameproduct, $pricein, $priceout, $details, $gender);
        
            $vaild = $vaild && $updateproductitemModel->updatequanity($dskichthuoc[0],$idproduct,$size1) 
            && $updateproductitemModel->updatequanity($dskichthuoc[1],$idproduct,$size2)
            && $updateproductitemModel->updatequanity($dskichthuoc[2],$idproduct,$size3)
            && $updateproductitemModel->updatequanity($dskichthuoc[3],$idproduct,$size4)
            && $updateproductitemModel->updatequanity($dskichthuoc[4],$idproduct,$size5);

            if($vaild)
            {
                header('Location:/cuahangthoitrang/productadmin.php?msg=updatedone-product');
            }
            else{
                header('Location:/cuahangthoitrang/updateproduct.php?msg=updatefail-product&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
            }
        }
        else
        {
            header('Location:/cuahangthoitrang/updateproduct.php?msg=loadfail-file&idproduct='.$idproduct.'&category='.$category.'&thumbnail='.$thumbnail);
        }  
    }
}