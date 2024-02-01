<?php
require_once('../modules/db.php');
require_once('../modules/helpers.php');
require_once('../models/favoriteItem.model.php');

$favoriteItem = new favoriteItemModel(DB());

$MaSP = $_GET['MaSP']??'';

$idsp = $_POST['MaSPdetail']??'';

$url = $_POST['Urldetail']??'';
$size = $_POST['Sizedetail']??'';
$quantity = $_POST['Quantitydetail']??'';
$quantitymax = $_POST['QuantitydetailMax']??'';
$from = $_POST['from']??'';

if($idsp!='' && $url !='' && $size !='' && $quantity !='' && $quantitymax !='' && $from !='')
{
    $favoriteItem->deteleProductFavorite($idsp);
    header('Location: /cuahangthoitrang/cart.php?msg=addfrom-favorite&MaSPdetail='.$idsp.'&Urldetail='.$url.'&Sizedetail='.$size.'&Quantitydetail='.$quantity.'&QuantitydetailMax='.$quantitymax.'&from='.$from);
}
elseif(isset($MaSP))
{
    $favoriteItem->deteleProductFavorite($MaSP);
    header('Location: /cuahangthoitrang/favorite.php?msg=delete-favorite');
}