<?php
require_once('../modules/validators.php');
require_once('../modules/db.php');
require_once('../modules/helpers.php');
require_once('../models/user.model.php');

const DUPLICATE = 'duplicate';
const INVALID = 'invalid';

function buildLocationPath(string $msgStatus): string
{
    $locPath ='Location: /cuahangthoitrang/register.php?msg=%s&username=%s&email=%s&phonenumber=%s&address=%s';

    global $username;
    global $email;
    global $phonenumber;
    global $address;

    return sprintf($locPath, $msgStatus, $username, $email, $phonenumber, $address);
}

$userModel = new userModel(DB());

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];

if(!empties($username,$email, $password, $phonenumber, $address))
{
    $valid = validateStringLength($email,13,256) && validateStringLength($phonenumber,10,11) 
    && validateEmail($email) && validateStringLength($password,8,20);

    $username = !empty($username) ? $username : null;

    if($valid)
    {
        if($userModel->exist($email))
        {
            header(buildLocationPath(DUPLICATE));
        }
        else
        {
            $userModel->insertcustomer($email, $password, $username, $phonenumber, $address);
            $userModel->insertfavorite();
            $userModel->insertcart();

            header('Location: /cuahangthoitrang/register.php?msg=done');
        }
    }
    else
    {
        header(buildLocationPath(INVALID));
    }
}
else
{
    header(buildLocationPath(INVALID));
}
exit();
