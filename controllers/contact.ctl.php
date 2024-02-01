<?php
require_once('../modules/helpers.php');
require_once('../modules/db.php');
require_once('../models/contact.model.php');
require_once('../modules/validators.php');

session_start();

function buildLocationPath(string $msgStatus):string
{
    $Locpath = 'Location: /cuahangthoitrang/contact.php?msg=%s&name=%s&gmail=%s&title=%s&message=%s';

    global $name;
    global $gmail;
    global $title;
    global $message;

    return sprintf($Locpath,$msgStatus,$name,$gmail,$title,$message);
}

$contactModel = new contactModel(DB());

$name = $_POST['name'];
$gmail =$_POST['gmail'];
$title = $_POST['title'];
$message = $_POST['message'];

if(!empties($name,$gmail,$title,$message))
{   
        $vaild = validateEmail($gmail) && $contactModel->checkEmail($gmail);

        if($vaild)
        {
            $contactModel->insertFeedBack($contactModel->checkEmail($gmail), $name, $gmail, $title, $message);
            header('Location: /cuahangthoitrang/contact.php?msg=done-contact');
        }
        else
        {
            header(buildLocationPath('checkemail'));
        }
}
else
{
    header(buildLocationPath('Emptyvalue'));
}

exit();