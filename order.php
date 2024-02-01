<?php
require_once('include_path.php');
require_once('controllers/order.ctl.php');

session_start();

OrderController::Render();