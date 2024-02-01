<?php
require_once('include_path.php');
require_once('controllers/cart.ctl.php');

session_start();

CartController::Render();