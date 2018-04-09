<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once ('imports.php');
session_start();

$model = new PortfolioModel();
$mainview = new PortfolioView($model);
$mailview = new MailView($model);
$controller = new PortfolioController($model, $mainview);

if(isset($_POST['submit'])){
    /* Submit button clicked on form */
    //echo "Here I am";
    $name = filter_input(INPUT_POST, 'name');
    $_SESSION['name'] = $name;

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $_SESSION['email'] = $email;

    $message = filter_input(INPUT_POST, 'message');
    $_SESSION['message'] = $message;

    echo "Send Email";
    
    $controller->contactSubmitPressed($_SESSION['name'], $_SESSION['email'], $_SESSION['message']);

    $mailview->output();
    return;
}
else
{
    //echo "No Here I am";
    //Initial page before first submission
    $mainview->output();
}
?>



