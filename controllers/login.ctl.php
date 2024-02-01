<?php
require_once ('../modules/helpers.php');
require_once('../modules/db.php');
require_once('../models/user.model.php');
require_once('../modules/validators.php');

session_start();

$userModel = new userModel(DB());

$email = $_POST['email'];
$password = $_POST['password'];

if(!empties($email, $password))
{
    $valid = validateEmail($email) && validateStringLength($password,8,20);
    if($valid)
    {
        $user = $userModel->login($email,$password);
        $admin = $userModel->loginadmin($email,$password);
        if($user)
        {
            $_SESSION['user'] = $user;
            header('Location: /cuahangthoitrang/');
        }
        elseif($admin)
        {
            $_SESSION['admin'] = $admin;
            header('Location: /cuahangthoitrang/admin.php');
        }
        else
        {
            header(('Location: /cuahangthoitrang/login.php?msg=login-fail&email='.$email));
        }
    }
    else
    {
        header('Location: /cuahangthoitrang/login.php?msg=login-valuefail&email='.$email);
    } 
}
exit();