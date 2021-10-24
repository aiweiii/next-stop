<?php
class ConnectionManager {

    public function getConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";  
        $dbname = "is216proj_trial";
        
        return new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);     
    }

}
?> 