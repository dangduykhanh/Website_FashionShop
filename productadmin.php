<?php
require_once('include_path.php');
require_once('controllers/productadminForm.ctl.php');

session_start();

productadminFormController::Render();