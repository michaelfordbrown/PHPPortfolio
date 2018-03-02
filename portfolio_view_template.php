<?php
// echo 'Portfolio View Template <br/>';
// separate file that imports all needed files
require_once ('imports.php');

// session_start — Start new or resume existing session
//session_start();

$view = unserialize($_SESSION['view']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" conte="Software Engineer Portfolio">
        <meta name="keywords" content="portfolio, software developer, software engineer, software tester, engineer manager">
        <meta name="author" content="Mike Brown, Michael Brown">


        <!-- Style Sheets -->
        <link href="./css/basic_frame.css" rel="stylesheet">

        <!-- Webb Page Title Tab -->
        <title>Mike Brown Portfolio | Welcome</title>  

        <!-- Scripts -->
        <script>
<?php
foreach ($view->getModel()->getPortfolioForm("SideBlockArray") as $sideblock) {
    echo "function " . $sideblock[1] . "ShowFunction() {\n";
    echo "var hidAttribute =  document.getElementById(\"" . $sideblock[1] . "\").getAttribute(\"hidden\");\n";
    echo "var elementById = document.getElementById(\"" . $sideblock[1] . "\");\n";
    echo "if (hidAttribute){\n";
    echo "  elementById.removeAttribute(\"hidden\");\n";
    echo "}\n";
    echo "else {\n";
    echo "  elementById.setAttribute(\"hidden\", true);\n";
    echo "};\n";
    echo "};\n";
}
?>
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
    if ($i == 0)
        echo "<li class=\"current\"><a onclick=\"" . $sideblock[1] . "ShowFunction()\">" . $sideblock[0] . "</a></li>\n";
    else
        echo "<li><a onclick=\"" . $sideblock[1] . "ShowFunction()\">" . $sideblock[0] . "</a></li>\n";
}
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

        <section  id="Projects" hidden="true">
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
                        echo "<tr><td class=\"td_hover\"><a href = \"" . $project[1] . "\">" . $project[0] . "</a> </td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot>                  
                </tfoot>
            </table>
        </section>

        <section id="Qualifications" hidden="true">
            <table class="">
                <thead>
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
                </tfoot>
            </table>
        </section>

        <section id="SWDevelopmentSkills" hidden="true">
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

                </tfoot>
            </table>
        </section>

        <section id="KeySkills" hidden="true">
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
                </tfoot>
            </table>

        </section>

        <section id="KeyCompetencies" hidden="true">
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
                </tfoot>
            </table>
        </section>


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

    </body>
</html>
