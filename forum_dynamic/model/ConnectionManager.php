<?php

class ConnectionManager {

    public function connect() {

    // LOCAL HOST
        // $servername = 'localhost';
        // $username = 'root';
        // // $password = 'root'; // -> MAMP server
        // $password = ''; // -> WAMP server
        // $dbname = 'wad2_proj';
        
        // // Create connection
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown

        // // Return connection object

    // HEROKU
        $servername = 'us-cdbr-east-04.cleardb.com';
        $username = 'b127ff0bf1984a';
        $password = 'a2cb3df1'; 
        $dbname = 'heroku_075b689eae6e371';
        
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown

        // Return connection object
        return $conn;
    }

}

?>
