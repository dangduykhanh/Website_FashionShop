<?php
require_once('../modules/db.php');
require_once('../models/cartitem.model.php');

$CartItemModel = new CartItemModel(DB());

$MaSP = $_GET['MaSP'];

if(isset($MaSP))
{
    $CartItemModel->deteleProductCart($MaSP);
    header('Location: /cuahangthoitrang/cart.php?msg=delete-favorite');
}