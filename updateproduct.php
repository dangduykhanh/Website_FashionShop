<?php
require_once('include_path.php');
require_once('controllers/updateproduct.ctl.php');

session_start();

updateproductController::Render();