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
        <title><?php echo $Title ?></title>
        <link href="basic_frame.css" rel="stylesheet">
        <link href="responsive_styles.css" rel="stylesheet">        
            
    </head>
    <body>
        
       
        <header id="Title">
            <?php           
                echo $view->getModel()->getPortfolioForm("MyProfessionalHandle");               
            ?>
        </header>
        
        <aside id="AsideLeft">
            <section  id="Projects">
                <h1>Projects</h1>
                <p>
                <?php foreach($view->getModel()->getPortfolioForm("WebProjectsArray") as $project) {
                    echo "<a href = \"".$project[1]."\">".$project[0]."</a> <br/>";
                } ?>
                </p>
            </section>
            
            <section id="Qualifications">
                <h1>Qualifications</h1> 
                <p>
                 <?php foreach($view->getModel()->getPortfolioForm("QualificationsArray") as $qualification) {
                    echo "<a href = \"".$qualification[2]."\">".$qualification[0]."</a> <br/>".$qualification[1]."</a> <br/>";
                } ?>                 
                </p>
            </section>
            
            <section id="SWDevelopmentSkills">
                <h1>Web Development Skills</h1>
                    <?php 
                    echo "<p>";
                    foreach($view->getModel()->getPortfolioForm("SWDevSkillsArray") as $skill) {
                        echo $skill."<br/>";
                    } 
                    echo "</p>";
                    ?>

            </section>
        </aside>
        
        <article id="ArticleMain">
            <section id="Greeting">
                    <?php foreach($view->getModel()->getPortfolioForm("IntroArray") as $intro) {
                        echo "<p>".$intro."</p>";
                    } ?>
            </section>

            <section id="WebRoles">
                    <?php foreach($view->getModel()->getPortfolioForm("WebRoleArray") as $role) {
                        echo "<p>".$role."</p>";
                    } ?>
            </section>
            
            <section id="LastRole">
                    <?php foreach($view->getModel()->getPortfolioForm("LastRoleArray") as $role) {
                        echo "<p>".$role[0]."</p>";
                    } ?>              
            </section>

            <section id="SiteIntro">
                    <?php foreach($view->getModel()->getPortfolioForm("SiteIntroArray") as $intro) {
                        echo "<p>".$intro[0]."</p>";
                    } ?>
            </section>
            
            <section id="StudyPlans">
                    <?php foreach($view->getModel()->getPortfolioForm("StudyPlansArray") as $studyplans) {
                        echo "<p>".$studyplans[0]."</p>";
                    } ?>
            </section>
            
            <section id="ThankYou">
                Thank you for your time. 
                If you are looking for further details please contact me.                 
            </section>

        </article>
        
        <aside id="SkillsCompetencies">
            <h1>Key Skills</h1>
            
            <section id="KeySkills">
                <h1>Knowledge of</h1>
                <ul>
                    <?php foreach($view->getModel()->getPortfolioForm("KeySkillsArray") as $skill) {
                        echo "<li>".$skill."</li>";
                    } ?>
                </ul>   
            </section>

            <section id="KeyCompetencies">
                <h1>Key Competencies:</h1>
                <ul>
                    <?php foreach($view->getModel()->getPortfolioForm("KeyCompetenciesArray") as $skill) {
                        echo "<li>".$skill."</li>";
                    } ?>
                </ul>   
            </section>
            
        </aside>
        
        <footer id="FooterLinks">
            <?php foreach($view->getModel()->getPortfolioForm("FooterArray") as $foot) {
                echo "<p>";
                echo "<a href=\"#\">".$foot[0]."</a>";
                echo "</p>";
            } ?>
        </footer>
    </body>
</html>
