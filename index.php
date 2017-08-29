<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

    // echo 'Portfolio Index <br/>';
    
    include_once ('imports.php');
    session_start();
        
    $model = new PortfolioModel();
        
    $view = new PortfolioView($model);
        
    $controller = new PortfolioController($model, $view);
        
    $view->output();
        
?>



