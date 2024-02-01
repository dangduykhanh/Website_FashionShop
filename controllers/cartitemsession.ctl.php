<?php
require_once('../models/DTOs/chitietgiohangsession.php');
session_start();

$MaSP = $_GET['MaSP']??='';


if($MaSP !='' && isset($_SESSION['productnotlogin']) && !empty($_SESSION['productnotlogin']))
{
    foreach ($_SESSION['productnotlogin'] as $key=>$sanpham){ 

        if (isset($sanpham)) {
        if($sanpham->getMaSP() == $MaSP)
        {
            unset($_SESSION['productnotlogin'][$key]);
            header('Location: /cuahangthoitrang/cart.php?msg=delete-favorite');
            break;
        }
        } 
    }   
}