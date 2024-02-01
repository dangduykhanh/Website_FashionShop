<?php
require_once('include_path.php');
require_once('controllers/orderadmin.ctl.php');

session_start();

orderadminController::Render();