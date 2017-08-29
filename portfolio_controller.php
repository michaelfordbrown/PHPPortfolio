<?php

// echo 'Portfolio Controller <br/>';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portfolio_controller
 *
 * @author micha
 */
class PortfolioController {

    // Need a reference to both the model and the view
     private $model;
     private $view;
     
     public function __construct(PortfolioModel $model, PortfolioView $view){
         $this->model = $model;
         $this->view = $view;
         
     }
    
    
 }


