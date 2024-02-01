<?php
require_once('include_path.php');
require_once('controllers/customer.ctl.php');

session_start();

customerController::Render();