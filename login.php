<?php
require_once('include_path.php');
require_once ('controllers/loginForm.ctl.php');

session_start();

loginFormController::Render();