<?php
require_once('../modules/db.php');
require_once('../models/orderadminitem.model.php');

$orderadminitemModel = new orderadminitemModel(DB());

$madh = $_GET['madh'];

$orderid=$_POST['order_id'];
$updatepayment = $_POST['update_payment'];

if(isset($madh))
{
    $orderadminitemModel->deteleorder($madh);
    header('Location: /cuahangthoitrang/orderadmin.php?msg=deletedone-order');
}
elseif(isset($orderid) && isset($updatepayment))
{
    $orderadminitemModel->updatetinhtrangdh($orderid, $updatepayment);
    header('Location: /cuahangthoitrang/orderadmin.php?msg=updatedone-order');
}