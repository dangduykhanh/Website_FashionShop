<?php
require_once('include_path.php');
require_once('controllers/feedback.ctl.php');

session_start();

feedbackController::Render();