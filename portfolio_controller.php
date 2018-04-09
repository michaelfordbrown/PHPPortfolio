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
     
     public function contactSubmitPressed($name, $mailFrom, $message){
        
        require("./sendgrid-php/sendgrid-php.php");

        $subject ="Mail From Portfolio Web Site";
            
        $homeEmail = getenv("HOME_GMAIL");
        //echo 'Home Email . . '.$homeEmail;
        
        $from = new SendGrid\Email("Mike Brown", $homeEmail);
        $to = new SendGrid\Email("Mike Brown", "michaelbrown20160630@gmail.com");
        $content = new SendGrid\Content("text/plain","Contact From: ".$name."\n"."Email: ".$mailFrom."\n\nMessage: ".$message."\n");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
       
        $apiKey = getenv("SENDGRID_API_KEY");
        //
        //echo "API KEY = ".$apiKey;
        
        //echo "Sending email from".$mailFrom."  ".time()."<br/>";
        
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        //echo 'Email Status . . '.$response->statusCode();
        
        /*if (($response->statusCode() == 200) || ($response->statusCode() == 202))
        {

        }
        else
        {
            'Email Error . . '.$response->statusCode();
        }       
        */
        
    }
    
}

?>
