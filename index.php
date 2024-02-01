<?php
require_once('include_path.php');
require_once('controllers/index.ctl.php');

session_start();

IndexController::Render();