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
            $username = 'b127ff0bf1984a';
            $password = 'a2cb3df1';
            $dbname = 'heroku_075b689eae6e371';
            
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