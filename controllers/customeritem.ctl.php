<?php
require_once('../modules/db.php');
require_once('../models/customeritem.model.php');

$customeritemModel = new customeritemModel(DB());

$makh = $_GET['makh'];

if(isset($makh))
{
    $customeritemModel->detelecustomer($makh);
    header('Location: /cuahangthoitrang/customer.php?msg=deletedone-customer');
}