<?php
require_once('include_path.php');
require_once('controllers/search.ctl.php');

session_start();

SearchController::Render();

