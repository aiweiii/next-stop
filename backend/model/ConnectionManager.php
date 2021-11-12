<?php

class ConnectionManager {

    function connect() {
        // LOCAL HOST
            // $servername = "localhost";
            // $username = "root";
            // $password = "";
            // $dbname = "wad2_proj";
            
            // // Create connection
            // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // return $conn;
            // // if fail, exception will be thrown

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
    
    function handleError($obj, $sql = null, $parameters = null) {
        $details = [
            "errno" => $obj->errorCode(),
            "errstr" => $obj->errorInfo(),

        ];
        if (! is_null($sql) ) {
            $details["sql"] = $sql;
        }
        if (! is_null($parameters) ) {
            $details["parameters"] = $parameters;
        }
        
        Logger::log( "Database Error", $details );
    }    
}

?>