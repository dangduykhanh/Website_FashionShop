<?php
require_once('../modules/db.php');
require_once('../models/feedbackitem.model.php');

$feedbackitemModel = new feedbackitemModel(DB());

$magy = $_GET['magy'];

if(isset($magy))
{
    $feedbackitemModel->detelefeedback($magy);
    header('Location: /cuahangthoitrang/feedback.php?msg=deletedone-feedback');
}