<?php
require_once('include_path.php');
require_once('controllers/admin.ctl.php');

session_start();

adminController::Render();