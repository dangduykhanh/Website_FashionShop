<?php
require_once('include_path.php');
require_once('controllers/shop.ctl.php');

session_start();

ShopController::Render();