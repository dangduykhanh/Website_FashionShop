<?php
require_once('include_path.php');
require_once('controllers/favorite.ctl.php');

session_start();

FavoriteController::Render();