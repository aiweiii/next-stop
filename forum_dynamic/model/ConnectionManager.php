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
        $username = 'b6bd77d7a28d3b';
        // $password = 'root'; // -> MAMP server
        $password = 'f1bdda31'; // -> WAMP server
        $dbname = 'heroku_38ec8b215cf2e16';
        
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown

        // Return connection object
        return $conn;
    }

}

?>
