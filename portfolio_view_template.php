<?php 

// echo 'Portfolio View Template <br/>';
    
// separate file that imports all needed files
require_once ('imports.php');

// session_start — Start new or resume existing session
//session_start();

$view = unserialize($_SESSION['view']);

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- CDN versions of jQuery and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

        <!-- Style Sheets -->
        <link href="basic_frame.css" rel="stylesheet">
        <link href="responsive_styles.css" rel="stylesheet">        
        <link href="navbar_styles.css" rel="stylesheet"> 
        <link href="table_styles.css" rel="stylesheet">

        <!-- Webb Page Title Tab -->
        <title>Mike Brown Portfolio(PHP/MySQL)</title>        
    </head>
    <body>      
        
        <!-- Fixed Header with Links -->
        <header id="">
            <div class="topnav" id="myTopnav">
                <?php echo "<a href=\"#\">".$view->getModel()->getPortfolioForm("MyProfessionalHandle")[0][0]."&nbsp</a>";?>
                <a href="http://mikebrownmyportfolio.azurewebsites.net/default.aspx">Other Portfolios &nbsp;</a>
                <a href="http://mikebrownmyportfolio.azurewebsites.net/plans.aspx">Projects &nbsp;</a>   
            </div>
        </header>
        
        <!-- Left Hand Side Aside Column -->
        <aside id="AsideLeft">
            <section  id="Projects">
                <table class="">
                    <caption>Home Projects That Used Learnt Web Technology</caption>
                    <thead>
                        <tr>
                            <th>Projects</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get list of projects and their links from associated data structure -->
                        <?php foreach($view->getModel()->getPortfolioForm("WebProjectsArray") as $project) {
                            echo "<tr><td class=\"td_hover\"><a href = \"".$project[1]."\">".$project[0]."</a> </td></tr>";
                        } ?>
                    </tbody>
                    <tfoot>                  
                    </tfoot>
                </table>
            </section>

            <section id="Qualifications">
                <table class="">
                    <caption>Technical and Professional Qualifications</caption>
                    <thead>
                        <tr>
                            <th>Institution</th>
                            <th>Qualifications</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get list of qualifications and the institution links from associated data structure -->
                        <?php foreach($view->getModel()->getPortfolioForm("QualificationsArray") as $qualification) {
                            echo "<tr><td class=\"td_hover\"><a href = \"".$qualification[2]."\">".$qualification[0]."</a> </td><td>".$qualification[1]."</td></tr>";
                        } ?>                 
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </section>
     
            <section id="SWDevelopmentSkills">
                <table class="">
                    <caption>New and Old Skills Relevant to Web Development</caption>
                    <thead>
                        <tr>
                            <th>Web Development Skills</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get list of skills from associated data structure -->                        
                        <?php 
                            foreach($view->getModel()->getPortfolioForm("SWDevSkillsArray") as $skill) {
                                echo "<tr><td>".$skill."</td></tr>";
                            } 
                        ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </section>
        </aside>
        
        <!-- Centre main article -->
        <article id="ArticleMain">

            <!-- Each paragraph obtained from associate array that is read from database -->
            <section id="Greeting">
                            <h1>Mike's Portfolio (MVC PHP / MySQL Based)</h1>
            <p>
                    <?php foreach($view->getModel()->getPortfolioForm("IntroArray") as $intro) {
                        echo $intro."&nbsp";
                    } ?>
                </p>
            </section>
       
            <section id="WebRoles">
                <p>
                    <?php foreach($view->getModel()->getPortfolioForm("WebRoleArray") as $role) {
                        echo $role."&nbsp";
                    } ?>
                </p>
            </section>
            
            <section id="LastRole">
                <p>
                    <?php foreach($view->getModel()->getPortfolioForm("LastRoleArray") as $role) {
                        echo $role[0]."&nbsp";
                    } ?>   
                </p>
            </section>

            <section id="SiteIntro">
                <p>
                    <?php foreach($view->getModel()->getPortfolioForm("SiteIntroArray") as $intro) {
                        echo "<a href = \"".$intro[1]."\">".$intro[0]."</a> <br/>";
                    } ?>
                </p>
            </section>
            
            <section id="StudyPlans">
                <p>
                    <?php foreach($view->getModel()->getPortfolioForm("StudyPlansArray") as $studyplans) {
                        echo $studyplans[0]."&nbsp";
                    } ?>
                </p>
            </section>
            
            <section id="ThankYou">
                Thank you for your time. 
                If you are looking for further details please contact me at michaelbrown20160630@gmail.com.                 
            </section>

        </article>
        
        <aside id="SkillsCompetencies">
            <table class="">
                <caption>List of Web Technology Skills Learnt</caption>
                <thead>
                    <tr>
                        <th>Key Skills</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $arrrayLength = count($view->getModel()->getPortfolioForm("KeySkillsArray"));
                        for ($x = 0; $x < $arrrayLength; $x=$x+2)
                        {
                            /* for each skill display personal experience (using abbr) and add links to source code */
                            echo "<tr>";
                            echo "<td class=\"td_hover\">".
                            "<a href=\"".
                                $view->getModel()->getPortfolioForm("KeySkillsArray")[$x][2].
                            "\">".
                            "<abbr title=\"".
                                $view->getModel()->getPortfolioForm("KeySkillsArray")[$x][1].
                                    "\">".
                                    $view->getModel()->getPortfolioForm("KeySkillsArray")[$x][0].
                            "</abbr>".
                            "</a>".
                            "</td>";
                            
                            /* handle odd number of data entries in this two column table */
                            if (($arrrayLength %2) && ($x = ($arrrayLength-1)))
                            {
                                echo "<td>&nbsp</td>";
                            }
                            else
                            {
                                echo "<td class=\"td_hover\">".
                                "<a href=\"".
                                    $view->getModel()->getPortfolioForm("KeySkillsArray")[$x+1][2].
                                "\">".
                                "<abbr title=\"".
                                    $view->getModel()->getPortfolioForm("KeySkillsArray")[$x+1][1].
                                        "\">".
                                      $view->getModel()->getPortfolioForm("KeySkillsArray")[$x+1][0].
                                "</abbr>".
                                "</a>".
                                "</td>";
                            }
                            echo "</tr>";                        
                        }
                    ?> 
                </tbody>
                <tfoot>
                </tfoot>
            </table>
             <section id="KeyCompetencies">
                <table class="">
                    <caption>Soft Skill Experiences</caption>
                    <thead>
                        <th>Key Competencies:</th>
                    </thead>
                    <tbody>
                        <?php foreach($view->getModel()->getPortfolioForm("KeyCompetenciesArray") as $skill) {
                            echo "<tr><td>".$skill."</td></tr>";
                        } ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </section>
            
        </aside>
        
        <footer>
            <div>
                <!-- future development --->
                <?php foreach($view->getModel()->getPortfolioForm("FooterArray") as $foot) {
                    echo "<button>";
                    echo "<a href=\"#\">".$foot[0]."</a>";
                    echo "</button>";
                } ?>
            </div>
        </footer>
    </body>
</html>
