<?php
session_start();

if(!empty($_SESSION['user']))
{
    unset($_SESSION['user']);
    header('Location: /cuahangthoitrang/index.php');
}
elseif(!empty($_SESSION['admin']))
{
    unset($_SESSION['admin']);
    header('Location: /cuahangthoitrang/login.php');
}
else
{
    header('Content-type: text/html; charset=utf8');
    echo 'Không thể đăng xuất';
}