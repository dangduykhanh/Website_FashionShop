<?php
require_once('include_path.php');
require_once('controllers/detail.ctl.php');

session_start();
DetailController::Render();