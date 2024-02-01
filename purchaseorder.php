<?php
require_once('include_path.php');
require_once('controllers/purchaseorder.ctl.php');

session_start();

PurchaseOrderController::Render();