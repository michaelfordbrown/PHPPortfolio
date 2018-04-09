<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ('imports.php');
// session_start — Start new or resume existing session
if (session_status() == PHP_SESSION_NONE){
    session_start();    
}

$view = unserialize($_SESSION['view']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" conte="Software Engineer Portfolio">
        <meta name="keywords" content="portfolio, software developer, software engineer, software tester, engineer manager">
        <meta name="author" content="Mike Brown, Michael Brown">

        <!-- JQuery -->
        <script type="text/javascript" src="lib/jquery-3.3.1.js"></script>

        <!-- Style Sheets -->
        <link href="./css/basic_frame.css" rel="stylesheet">

        <!-- Webb Page Title Tab -->
        <title>Mike Brown Portfolio | Mail Sent</title>  

        <script type="text/javascript">
        </script>

    </head>
    <body>
        <!-- Fixed Header with Links -->
        <header>
            <div id="branding">
                <h1>
                    <?php echo "<span class=\"highlight\">" . $view->getModel()->getPortfolioForm("MyProfessionalHandle")[0][0] . "</span>"; ?>                        
                </h1>
            </div>
            <nav>
                <ul>
                    <li><a href="portfolio_view_template.php">Return to Main Page</a></li>
                </ul>
            </nav>
        </header>
        <section id="showcase">
            <h1>
                Thank You for Contacting Me.
            </h1>
            <p> I will try to get back to you as soon as possible.</p>
        </section>

        <footer>
            <div class="button-area-line">
                <?php
                foreach ($view->getModel()->getPortfolioForm("FooterArray") as $foot) {
                    echo "<a href=\"" . $foot[1] . "\">" . $foot[0] . "</a>";
                }
                ?>
            </div>
        </footer>

        <script>

        </script>
</html>
