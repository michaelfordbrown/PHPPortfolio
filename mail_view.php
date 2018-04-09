<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MailView {
    
    private $model;
    
    public function __construct(PortfolioModel $model){
        $this->model = $model;
        $_SESSION['view'] = serialize($this);
    }
    
    public function getModel() {
        return $this->model;
    }
    
    public function output(){
        require_once("mail_view_template.php");
        $_SESSION['view'] = serialize($this);
        header('Location:mail_view_template.php');
        die();
    }
}
 ?>