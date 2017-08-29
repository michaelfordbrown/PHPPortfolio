<?php

/**
 * Description of portfolio_model
 *
 * @author micha
 */

// echo 'Portfolio Model <br/>';
    
class PortfolioModel {
    
    // Class Constants
    
    const DB_FILE="portolio";
    


    // Class Properties
 
    
    private $PortfolioForm = array(
        "MyProfessionalHandle" => "Mike Brown . Newbie",
        
        "IntroArray" => array("Hello! My name is Michael Brown and I am a Hampshire (Basingstoke) - based software engineer."),
       
        "WebRoleArray" => array("I have recently gained Microsoft Certified (Microsoft Technology 
                          Associate - Software Development Fundamentals C#)."),
    
        "LastRoleArray" => array(array("My last employment was in the wireless industry 
                            where I, along with my team, were made redundant 
                            back in June 2016.","#"),),
    
        "FooterArray" => array(array("HOME","#")),
    
        "KeySkillsArray" => array("HTML"),

        "QualificationsArray" => array(array("Microsoft MTA", 
                                             "98-361 Software Development Fundamentals, C#",
                                             "#")),
                             
        "SWDevSkillsArray" => array("Front end website development", 
                                    "Back end website development", 
                                    "Programming languages JavaScript, PHP, C# and C++",
                                    "Unit Testing", 
                                    "Database setup and implementation"),
    
        "KeyCompetenciesArray" => array("High motivation under all environments.",
                                        "Self drive to raise standards and targets.", 
                                        "Keen to learn new things in Website development.", 
                                        "Multi-site working and team leadership experience.", 
                                        "Capital and personnel budget management.", 
                                        "Interfaced and supporting demanding customers.", 
                                        "Creating skills development programmes."),
    
        "WebProjectsArray" => array(array("My Portfolio (PHP)","#")),
        
        "StudyPlansArray" => array(array("I have recently picked up skills in PHP (including Object-Oriented PHP, OOP)","#")),
        
        "SiteIntroArray" => array(array("This site focuses upon recent skills I have acquired along with some learnt from previous roles.", "#"))
        
        
        
        );
    
    
    // Class Member Functions

    public function getKeysMultidimensional(array $array) 
    {
        $keys = array();
        foreach( $array as $key => $value)
        {
            $keys[] = $key;
            if( is_array($value) ) { 
                $keys = array_merge($keys, $this->getKeysMultidimensional($value));
            }
        }
        
        return $keys;
    }
    
    public function getArrayDepth($array)
    {
        // some functions that usually return an array occasionally return false
        if (!is_array($array)) {
            return 0;
        }

        $dimensions = 1;
        $max = 0;
        
        foreach ($array as $value) {
            if (is_array($value)) {
                $subDimensions = $this->getArrayDepth($value);
                if ($subDimensions > $max) 
                {
                    $max = $subDimensions;
                }
            }
        }

    return $dimensions+$max;

    }
    
    public function getTableData($result, $assocIndex, $field)
    {
        if($result->num_rows > 0)
        {
            $index = 0;
            while($singleRowFromQuery = $result->fetch_assoc())
            {               
                // put handle details into array
                $this->PortfolioForm[$assocIndex][$index] = $singleRowFromQuery[$field];
                //echo "PortfolioForm[$assocIndex][$index] = ".$this->PortfolioForm[$assocIndex][$index]."<br/>".PHP_EOL;
                
                $index++;
           }
        }       
    }
    
    public function getRowData($result, $assocIndex, $field1, $field2=NULL)
    {
        //echo "<br/>"."Data Type = ".gettype( $this->PortfolioForm[$assocIndex])."<br/>";
        
        $ArrayDepth = -1;
        
        $ArrayDepth = $this->getArrayDepth($this->PortfolioForm[$assocIndex]);
        
        if ($ArrayDepth == 2)
        {
            
            // work around that uses initialised array
            if (count($this->PortfolioForm[$assocIndex][0]) == 3)
            {
                $ArrayDepth  = 3;
            }
        }
        //echo "<br/>"."Arrary Depth == ".$ArrayDepth."<br/>";
       
        

        $index = 0;
        while($singleRowFromQuery = $result->fetch_assoc())
        {
            //
            switch ($ArrayDepth)
            {
                case 0:
                {
                    $this->PortfolioForm[$assocIndex] = $singleRowFromQuery[$field1];                
                    //echo "PortfolioForm[$assocIndex] = ".$this->PortfolioForm[$assocIndex]."<br/>".PHP_EOL;
                    break;
                }
                case 1:
                {        
                    $this->PortfolioForm[$assocIndex][$index] = $singleRowFromQuery[$field1];
                    //echo "PortfolioForm[$assocIndex][$index] = ".$this->PortfolioForm[$assocIndex][$index]."<br/>".PHP_EOL;
                    $index++;
                }
                break;
            
                case 2:
                {
                   
                    $this->PortfolioForm[$assocIndex][$index][0] = $singleRowFromQuery[$field1];
                    //echo "+PortfolioForm[$assocIndex][$index].$field1 = ".$this->PortfolioForm[$assocIndex][$index][0]."<br/>".PHP_EOL;
                    
                    $this->PortfolioForm[$assocIndex][$index][1] = $singleRowFromQuery["link"];
                    //echo "-PortfolioForm[$assocIndex][$index].link = ".$this->PortfolioForm[$assocIndex][$index][1]."<br/>".PHP_EOL;
                    
                    $index++;
                    break;
                }
                
                case 3:
                {
                    $this->PortfolioForm[$assocIndex][$index][0] = $singleRowFromQuery[$field1];
                    //echo "+PortfolioForm[$assocIndex][$index].$field1 = ".$this->PortfolioForm[$assocIndex][$index][0]."<br/>".PHP_EOL;
                    
                    $this->PortfolioForm[$assocIndex][$index][1] = $singleRowFromQuery[$field2];
                    //echo "-PortfolioForm[$assocIndex][$index].$field2 = ".$this->PortfolioForm[$assocIndex][$index][1]."<br/>".PHP_EOL;
                    
                    $this->PortfolioForm[$assocIndex][$index][2] = $singleRowFromQuery["link"];
                    //echo "-PortfolioForm[$assocIndex][$index].link = ".$this->PortfolioForm[$assocIndex][$index][2]."<br/>".PHP_EOL;
                    
                    $index++;
                    break;
                }
                
                default:
                {
                    echo "Warning Structure of PortfolioForm[$assocIndex] not covered!";
                }
            }
        }

    }
    
    public function __construct() {
        
        /*
         * local server
         * 
         * dbPassword = "PHPFundamentals";
         * $dbUserName = "PHPFundamentals";
         * $dbServer = "localhost";
         * $dbName = "portfolio";
         * 
         */
        
        //password removed from public source
         $dbPassword = "";
         $dbUserName = "mysqldbuser@michaelfordbrownphpsql-mysqldbserver";
         $dbServer = "michaelfordbrownphpsql-mysqldbserver.mysql.database.azure.com";
         $dbName = "mysqldatabase5965";
        
    
        //create a class representing connection between PHP and a MySQL database
        $connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);


        // check if connection to databse failed then exit with error message
        if($connection->connect_errno)
        {
            exit("Database Connection Failed. Reason: ".$connection->connect_error);        
        }
        
        // get database entries
        
        $ArrayKeys  = array_keys($this->PortfolioForm);
        
        foreach ($ArrayKeys as $Table)
        {
            //echo 'Table Name: '.strtolower($Table).'<br/>';
            $col = "SHOW COLUMNS FROM ".strtolower($Table);
            //echo 'col = '.$col.'<br/>';
            
            $resultObj = $connection->query($col);
            
            //echo '<pre>'.print_r($resultObj).'</pre>';
            
            if (!$resultObj)
            {
                echo 'Could not run query: '.$connection->connect_error;
                exit;
            }
            
            $FieldName[] = array("NULL","NULL","NULL");
            if ($resultObj->num_rows > 0) 
            {
                for ($i = 0; $i <=($resultObj->num_rows - 1); $i++)
                {
                    //echo '<pre>'.print_r($row).'</pre><br/>';
                    $row = $resultObj->fetch_assoc();
                    if ($i > 0)
                    {
                        $FieldName[$i-1] = $row['Field'];
                        //echo 'Field name = '.$row['Field'].'</br>';
                    } 
                }
                //echo '<br/>';
                //echo '<pre>'.print_r(array_slice($resultObj, 1, 1, true)).'</pre>';

                $query = "SELECT * FROM ".strtolower($Table);
                //echo $query.'<br/>';
                $resultObj = $connection->query($query);
                $this->getRowData($resultObj, $Table, $FieldName[0], $FieldName[1]);
            }
            //echo '<br/>';
        }

    }
    
     public function getPortfolioForm($index){
        return $this->PortfolioForm[$index];
    }

}    

?>