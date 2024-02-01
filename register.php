<?php
require_once('include_path.php');
require_once('controllers/registerForm.ctl.php');

session_start();

RegisterFormController::Render();