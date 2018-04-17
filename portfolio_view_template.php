<?php
//echo 'Portfolio View Template <br/>';
// separate file that imports all needed files
require_once ('imports.php');
// session_start — Start new or resume existing session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$view = unserialize($_SESSION['view']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" conte="Software Engineer Portfolio">
        <meta name="keywords" content="portfolio, software developer, software engineer, software tester, engineer manager">
        <meta name="author" content="Mike Brown, Michael Brown">
        <meta name="description" content="Portfolio of Basingstoke development engineer, Mike Brown, Past experiences in the wireless communication industry (development, testing support and management), has recently expanded skill set to include web technologies, looking for new opportunities.">

        <!-- JQuery -->
        <script type="text/javascript" src="lib/jquery-3.3.1.js"></script>

        <!-- Style Sheets -->
        <link rel="stylesheet" href="css/style.css"> 

        <!-- Webb Page Title Tab -->
        <title>Mike Brown Portfolio | Welcome</title>  

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117662314-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-117662314-1');
        </script>


    </head>
    <body>      
        <!-- Fixed Header with Links -->
        <header>
            <nav>
                <ul class="topnav">
                    <?php echo "<li><a class=\"branding active\" href=\"" . $view->getModel()->getPortfolioForm("MyProfessionalHandle")[0][1] . "\"> <span class=\"highlight\">" . $view->getModel()->getPortfolioForm("MyProfessionalHandle")[0][0] . "</span> </a> </li>"; ?>                                            
                    <?php
                    foreach ($view->getModel()->getPortfolioForm("SideBlockArray") as $i => $sideblock) {
                        echo "<li><a onclick=\"toggle_visibility('" . $sideblock[1] . "');\">" . $sideblock[0] . "</a></li>\n";
                    }
                    echo "<li class=\"contact right\"><a onclick=\"toggle_visibility('ContactForm');\">Contact</a></li>\n";
                    ?>                        
                </ul>
            </nav>
        </header>

        <!-- SHOWCASE -->
        <section id="showcase" class="showcase">
            <div class="center">
                <h1>
                    Professional Software Developer
                </h1>
                <hr>
                <?php
                foreach ($view->getModel()->getPortfolioForm("IntroArray") as $intro) {
                    echo "<p>" . $intro . "</p>\n";
                }
                ?>
            </div>
        </section>

        <!-- PROJECTS -->
        <section id="Projects" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">
                    <table class="datatable">
                        <thead>
                            <tr>
                                <th>Projects</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Get list of projects and their links from associated data structure -->
                            <?php
                            foreach ($view->getModel()->getPortfolioForm("WebProjectsArray") as $project) {
                                echo "<tr><td class=\"td_hover\" ";
                                echo "onClick=\"open_window('" . $project[1] . "')\"";
                                echo ">" . $project[0];
                                echo "</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>       
                            <tr>
                                <td class="closepopup" onclick="toggle_visibility('Projects')">Close Projects Pop-Up</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

        <!-- QUALIFICATIONS -->
        <section id="Qualifications"  class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">
                    <table class="datatable">
                        <thead>
                            <tr>
                                <th colspan="2">Qualifications</th> 
                            </tr>
                            <tr>
                                <th>Institution</th>
                                <th>Qualifications</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Get list of qualifications and the institution links from associated data structure -->
                            <?php
                            foreach ($view->getModel()->getPortfolioForm("QualificationsArray") as $qualification) {
                                echo "<tr><td class=\"td_hover\" ";
                                echo "onClick=\"open_window('" . $qualification[2] . "')\"";
                                echo ">" . $qualification[0];
                                echo "</td>";
                                echo "<td>" . $qualification[1] . "</td></tr>";
                            }
                            ?>                 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="closepopup" onclick="toggle_visibility('Qualifications')">Close Qualifications Pop-Up</td>
                            </tr>                    
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

        <!-- DEVELOPMENT SKILLS -->
        <section id="SWDevelopmentSkills" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">            
                    <table class="datatable">
                        <thead>
                            <tr>
                                <th>Development Skills</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Get list of skills from associated data structure -->                        
                            <?php
                            foreach ($view->getModel()->getPortfolioForm("SWDevSkillsArray") as $skill) {
                                echo "<tr><td>";
                                echo $skill;
                                echo "</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="closepopup" onclick="toggle_visibility('SWDevelopmentSkills')">Close SW Development Skills Pop-Up</td>
                            </tr>                     
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

        <!-- SKILLS -->
        <section id="KeySkills" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">                
                    <table class="datatable">
                        <thead>
                            <tr>
                                <th colspan="2">Key Skills</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $arrrayLength = count($view->getModel()->getPortfolioForm("KeySkillsArray"));
                            for ($x = 0; $x < $arrrayLength; $x = $x + 2) {
                                /* for each skill display personal experience (using abbr) and add links to source code */
                                echo "<tr>";
                                echo "<td class=\"td_hover\">" .
                                "<a href=\"" .
                                $view->getModel()->getPortfolioForm("KeySkillsArray")[$x][2] .
                                "\">" .
                                "<abbr title=\"" .
                                $view->getModel()->getPortfolioForm("KeySkillsArray")[$x][1] .
                                "\">" .
                                $view->getModel()->getPortfolioForm("KeySkillsArray")[$x][0] .
                                "</abbr>" .
                                "</a>" .
                                "</td>";
                                /* handle odd number of data entries in this two column table */
                                if (($arrrayLength % 2) && ($x = ($arrrayLength - 1))) {
                                    echo "<td>&nbsp</td>";
                                } else {
                                    echo "<td class=\"td_hover\">" .
                                    "<a href=\"" .
                                    $view->getModel()->getPortfolioForm("KeySkillsArray")[$x + 1][2] .
                                    "\">" .
                                    "<abbr title=\"" .
                                    $view->getModel()->getPortfolioForm("KeySkillsArray")[$x + 1][1] .
                                    "\">" .
                                    $view->getModel()->getPortfolioForm("KeySkillsArray")[$x + 1][0] .
                                    "</abbr>" .
                                    "</a>" .
                                    "</td>";
                                }
                                echo "</tr>";
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="closepopup" onclick="toggle_visibility('KeySkills')">Close Key Skills Pop-Up</td>
                            </tr>                      
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

        <!-- COMPETENCIES -->
        <section id="KeyCompetencies" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">              
                    <table class="datatable">
                        <thead>
                            <tr>
                                <th>Key Competencies:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($view->getModel()->getPortfolioForm("KeyCompetenciesArray") as $skill) {
                                echo "<tr><td>" . $skill . "</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="closepopup" onclick="toggle_visibility('KeyCompetencies')">Close Key Competencies Pop-Up</td>
                            </tr>                      
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

        <!-- CONTACTS -->
        <section id="ContactForm" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">
                    <form action="index.php" method="post">
                        <table class="datatable">
                            <thead>
                                <tr>
                                    <th colspan="2">Contact:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td><input type="text" name="name" placeholder="Full Name" required></td>
                                </tr>
                                <tr>
                                    <td>E-Mail:</td>
                                    <td><input type="email" name="email" placeholder="Valid Email Address" required></td>
                                </tr>
                                <tr>
                                    <td>Comment:</td>
                                    <td><textarea name="message" row="30" cols="30" required></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="closepopup" onclick="toggle_visibility('ContactForm')">Close Contact Pop-Up</td>
                                    <td>
                                        <input type="submit" class="closepopup" onclick="toggle_visibility('ContactForm')" name="submit" value="Send Comment">
                                    </td>
                                </tr>                      
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </section>

        <!-- BOXES -->
        <section id="boxes">
            <div class="boxbuttons">
                <?php
                foreach ($view->getModel()->getPortfolioForm("AreaExpertArray") as $area) {
                    echo "<div class=\"box\">";
                    echo "<img onclick=\"toggle_visibility('" . $area[0] . "');\" src=\".\img\\" . $area[2] . "\" alt=\"" . $area[0] . "\">";
                    echo "<h3>" . $area[0] . "</h3>";
                    echo "</div>\n";
                }
                ?>                
            </div>
            <div class="boxframes">
                <?php
                foreach ($view->getModel()->getPortfolioForm("AreaExpertArray") as $area) {
                    echo "<iframe id=\"" . $area[0] . "\" src=\"" . $area[1] . "\"></iframe>";
                }
                ?>   
            </div>
        </section>                                    

        <!-- PAGE FOOTER LINKS -->
        <footer>

            <ul class="bottomnav">
                <?php
                foreach ($view->getModel()->getPortfolioForm("FooterArray") as $foot) {
                    echo "<li><a href=\"" . $foot[1] . "\">" . $foot[0] . "</a></li>";
                }
                ?>
            </ul>

        </footer>

        <!-- Scripts -->
        <script type="text/javascript">

            function open_window(urlpath) {
                console.log("open " + urlpath);
                window.open(urlpath, "new", "top=100, left=200, height=400,width=900");
            }

            function toggle_visibility(id) {
                console.log("toggle pop up\n");
                var pu = document.getElementById(id);
                if (pu.style.display === "block")
                    pu.style.display = "none";
                else
                    pu.style.display = "block";
            }

<?php
foreach ($view->getModel()->getPortfolioForm("SideBlockArray") as $sideblock) {
    echo "function " . $sideblock[1] . "ShowFunction() {\r\n";
    echo "var hidAttribute =  $(\"#" . $sideblock[1] . "\").attr(\"hidden\");\r\n";
    echo "var elementById = $(\"#" . $sideblock[1] . "\");\r\n";
    echo "console.log(hidAttribute);\r\n";
    echo "if (hidAttribute){\r\n";
    echo "  elementById.removeAttr(\"hidden\");\r\n";
    echo "}\r\n";
    echo "else {\r\n";
    echo "  elementById.attr(\"hidden\", true);\r\n";
    echo "};\r\n";
    echo "};\r\n";
}
?>


        </script>

    </body>
</html>


