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
        <meta name="viewport" content="width=device-width">
        <meta name="description" conte="Software Engineer Portfolio">
        <meta name="keywords" content="portfolio, software developer, software engineer, software tester, engineer manager">
        <meta name="author" content="Mike Brown, Michael Brown">

        <!-- JQuery -->
        <script type="text/javascript" src="lib/jquery-3.3.1.js"></script>

        <!-- Style Sheets -->
        <link href="./css/basic_frame.css" rel="stylesheet">

        <!-- Webb Page Title Tab -->
        <title>Mike Brown Portfolio | Welcome</title>  

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
                    <?php
                    foreach ($view->getModel()->getPortfolioForm("SideBlockArray") as $i => $sideblock) {
                        echo "<li><a onclick=\"toggle_visibility('" . $sideblock[1] . "');\">" . $sideblock[0] . "</a></li>\n";
                    }
                    echo "<li><a onclick=\"toggle_visibility('ContactForm');\">Contact</a></li>\n";
                    ?>                        
                </ul>
            </nav>
        </header>
        <section id="showcase">
            <h1>
                Professional Software Developer
            </h1>
            <?php
            foreach ($view->getModel()->getPortfolioForm("IntroArray") as $intro) {
                echo "<p>" . $intro . "</p>\n";
            }
            ?>
        </section>

        <!-- PROJECTS -->
        <section id="Projects" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">
                    <table class="">
                        <thead>
                            <tr>
                                <th>Projects</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Get list of projects and their links from associated data structure -->
                            <?php
                            foreach ($view->getModel()->getPortfolioForm("WebProjectsArray") as $project) {
                                echo "<tr><td class=\"td_hover\">";
                                echo "<p onClick=\"open_window('" . $project[1] . "')\">" . $project[0] . "</p>";
                                echo "</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>       
                            <tr>
                                <td>
                                    <input class="closepopup" type="button" onclick="toggle_visibility('Projects')" value="Close Projects Pop-Up"/>
                                </td>
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
                    <table class="">
                        <thead>
                            <tr>
                                <th>Qualifications</th> 
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
                                echo "<tr><td class=\"td_hover\"><a href = \"" . $qualification[2] . "\">" . $qualification[0] . "</a> </td><td>" . $qualification[1] . "</td></tr>";
                            }
                            ?>                 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input class="closepopup" type="button" onclick="toggle_visibility('Qualifications')" value="Close Qualifications Pop-Up"/>
                                </td>
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
                    <table class="">
                        <thead>
                            <tr>
                                <th>Development Skills</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Get list of skills from associated data structure -->                        
                            <?php
                            foreach ($view->getModel()->getPortfolioForm("SWDevSkillsArray") as $skill) {
                                echo "<tr><td>" . $skill . "</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input class="closepopup" type="button" onclick="toggle_visibility('SWDevelopmentSkills')" value="Close SW Development Skills Pop-Up"/>
                                </td>
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
                    <table class="">
                        <thead>
                            <tr>
                                <th>Key Skills</th>    
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
                                <td>
                                    <input class="closepopup" type="button" onclick="toggle_visibility('KeySkills')" value="Close Key Skills Pop-Up"/>
                                </td>
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
                    <table class="">
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
                                <td>
                                    <input class="closepopup" type="button" onclick="toggle_visibility('KeyCompetencies')" value="Close Key Competencies Pop-Up"/>
                                </td>
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
                        <table class="">
                            <thead>
                                <tr>
                                    <th>Contact:</th>
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
                                    <td>
                                        <input class="closepopup" type="button" onclick="toggle_visibility('ContactForm')" value="Close Contact Pop-Up"/>
                                    </td>
                                    <td>
                                        <input class="closepopup" type="submit"  onclick="toggle_visibility('ContactForm')" name="submit" value="Send Comment">
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
            <div class="container">
                <?php
                foreach ($view->getModel()->getPortfolioForm("AreaExpertArray") as $area) {
                    echo "<div class=\"box\">\n<img src=\".\img\\" . $area[2] . "\">\n<h3>" . $area[0] . "</h3>\n<p>" . $area[1] . "</p>\n</div>\n";
                }
                ?>
            </div>
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


