<?php

/**
 * Description of portfolio_model
 *
 * @author micha
 */

define('DEBUG', false);

if(DEBUG)
{
    echo 'Portfolio Model Debug On<br/>';
}
    
class PortfolioModel {
    
    // Class Constants
    
    // Class Properties
 
    // Associate array that hads dynaamic data for the main portfolio page
    private $PortfolioForm = array(
        "MyProfessionalHandle" => array(array("Mike Brown . Newbie","#")),
        
        "IntroArray" => array("Hello! My name is Michael Brown and I am a Hampshire (Basingstoke) - based software engineer."),
       
        "WebRoleArray" => array("I have recently gained Microsoft Certified (Microsoft Technology 
                          Associate - Software Development Fundamentals C#)."),
    
        "LastRoleArray" => array(array("My last employment was in the wireless industry 
                            where I, along with my team, were made redundant 
                            back in June 2016.","#"),),
    
        "FooterArray" => array(array("HOME","#")),
    
        "KeySkillsArray" => array(array("HTML", "Hypertext Markup Language", "#")),

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
        
        "SiteIntroArray" => array(array("XThis site focuses upon recent skills I have acquired along with some learnt from previous roles@", "#")),
        
        "SideBlockArray" => array(array("Projects",
                                   "Projects"))        
        );
    
    
    // Class Member Functions

 
   
    public function getTableData($result, $assocIndex, $fields)
    {
        if(DEBUG)
        {
            echo "getTableData>Number of fields: ".count($fields)."<br/>";
        }   
        
        if(count($fields) > 0)
        {
            $i = 0;
            while($singleRowFromQuery = $result->fetch_assoc())
            {

                $index = 0;
                while($index < count($fields))
                {        
                    switch (count($fields))
                    {
                        case 3:
                        {
                             // put handle details into array
                            $this->PortfolioForm[$assocIndex][$i][0] = $singleRowFromQuery[$fields[$index]];
                            if(DEBUG)
                            {
                                echo "case 3a getTableData>PortfolioForm[$assocIndex][$i] $fields[0] = ".$this->PortfolioForm[$assocIndex][$i][0]."<br/>";
                            }
                            $index++;
                                
                            $this->PortfolioForm[$assocIndex][$i][1] = $singleRowFromQuery[$fields[$index]];
                            if(DEBUG)
                            {
                                echo "case 3b getTableData>PortfolioForm[$assocIndex][$i] $fields[1] = ".$this->PortfolioForm[$assocIndex][$i][1]."<br/>";
                            }
                            $index++;
                            
                            $this->PortfolioForm[$assocIndex][$i][2] = $singleRowFromQuery[$fields[$index]];
                            if(DEBUG)
                            {
                                echo "case 3c getTableData>PortfolioForm[$assocIndex][$i] $fields[2] = ".$this->PortfolioForm[$assocIndex][$i][2]."<br/>";
                            }
                            $i++;
                            break;                           
                        }
                            
                        case 2:
                        {
                             // put handle details into array
                            $this->PortfolioForm[$assocIndex][$i][0] = $singleRowFromQuery[$fields[$index]];
                            if(DEBUG)
                            {
                                echo "<br/>case 2a getTableData>PortfolioForm[$assocIndex][$i] $fields[0] = ".$this->PortfolioForm[$assocIndex][$i][0]."<br/>";
                            }
                            $index++;
                                
                            $this->PortfolioForm[$assocIndex][$i][1] = $singleRowFromQuery[$fields[$index]];
                            if(DEBUG)
                            {
                                echo "case 2b getTableData>PortfolioForm[$assocIndex][$i] $fields[1] = ".$this->PortfolioForm[$assocIndex][$i][1]."<br/>";
                            }
                            $i++;
                            break;                           
                        }
                        
                        case 1:
                        {
                            // put handle details into array
                            $this->PortfolioForm[$assocIndex][$i] = $singleRowFromQuery[$fields[$index]];
                            if(DEBUG)
                            {
                                echo "case 1 getTableData>PortfolioForm[$assocIndex][$i] $fields[$index] = ".$this->PortfolioForm[$assocIndex][$i]."<br/>";
                            }
                            $i++;
                            break;
                        }

                        default:
                        {
                            // put handle details into array
                            $this->PortfolioForm[$assocIndex] = $singleRowFromQuery[$fields[$index]];
                            if(DEBUG)
                            {
                                echo "case 0 getTableData>PortfolioForm[$assocIndex] $fields[$index] = ".$this->PortfolioForm[$assocIndex]."<br/>";
                            }
                            $i++;
                            break;
                        }
                    }
                    $index++;
                }
            }
            if(DEBUG)
            {            
                echo "<pre>".var_dump($this->PortfolioForm[$assocIndex])."</pre><br/>";
            }
        }       
    }
    
    public function __construct() {

        function connStrToArray($conn_str){ 

            // Initialize array.
            $conn_array = array();

            // Split conn string on semicolons. Results in array of "parts".
            $parts = explode(";", $conn_str); 

            // Loop through array of parts. (Each part is a string.)
            foreach($parts as $part){ 

            // Separate each string on equals sign. Results in array of 2 items.
            $temp = explode("=", $part); 

            // Make items key=>value pairs in returned array.
            $conn_array[$temp[0]] = $temp[1];
            }
            return $conn_array;
    
        }
    
        
        /*
         * local server
         * 
         */
          
        
        /* Local DB 
        $dbPassword = "PHPFundamentals";
        $dbUserName = "PHPFundamentals";
        $dbServer = "localhost";
        $dbName = "portfolio";      
                   
        
        /* AZURE DB */
        $db_Local_str = getenv("MYSQLCONNSTR_dbLocal");
        $db_Local_Array = connStrToArray($db_Local_str);
        
        $dbName = $db_Local_Array['Database'];
        $dbServer = $db_Local_Array['Data Source'];
        $dbUserName = $db_Local_Array['User Id'];
        $dbPassword = $db_Local_Array['Password'];
        
   
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
            if(DEBUG)
            { 
                echo 'Table Name: '.strtolower($Table).'<br/>';
            }
            $col = "SHOW COLUMNS FROM ".strtolower($Table);
            if(DEBUG)
            {
                echo 'col = '.$col.'<br/>';
            }
            $resultObj = $connection->query($col);
            
            if(DEBUG)
            {
                echo '<pre>'.print_r($resultObj).'</pre>';
            }
            
            if (!$resultObj)
            {
                echo 'Could not run query: '.$connection->connect_error;
                exit;
            }
            
            $databaseFields = array("id", "created_at","modified_on");
            
            $FieldName = array("");
            
            reset($FieldName);
            
            if(DEBUG)
            {
                echo "Field Name Array Count ".count($FieldName)."<br/>";
            }
            
            if ($resultObj->num_rows > 0) 
            {
                $l = 0;
                for ($i = 0; $i <=($resultObj->num_rows - 1); $i++)
                {
                    $row = $resultObj->fetch_assoc();
                    if(DEBUG)
                    {
                        echo '<pre>'.print_r($row).'</pre><br/>';
                    }


                    if (!in_array($row['Field'], $databaseFields))
                    {
                        $FieldName[$l++] = $row['Field'];

                        if(DEBUG)
                        {                         
                            echo 'Field name = '.$row['Field'].'</br>';
                        }
                    } 
                }

                $query = "SELECT * FROM ".strtolower($Table);

                $resultObj = $connection->query($query);
                
                $this->getTableData($resultObj, $Table, $FieldName);
            }
            
            if(DEBUG)
            {             
                echo '<br/>';
            }
        }
    }
    
     public function getPortfolioForm($index){
        return $this->PortfolioForm[$index];
    }

}    

?>