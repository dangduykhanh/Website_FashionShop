<?php
require_once('include_path.php');
require_once('controllers/contactForm.ctl.php');

session_start();

ContactController::Render();