<?php

 
    // specify your own database credentials
     $host = "localhost";
     $db_name = "projetfinformation";
     $username = "root";
     $password = "";
   
 
    // get the database connection


 
    
            $conn = new mysqli($host,$username,$password,$db_name);
        if($conn->connect_error){
            die("could nit connect to data base !".$conn->connect_error);
        
        }

//echo 'succesful';
 
    

?>