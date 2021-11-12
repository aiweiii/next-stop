<?php

class ConnectionManager {

    public function connect() {

                //Get Heroku ClearDB connection information
                $cleardb_url = parse_url(getenv("mysql://b6bd77d7a28d3b:f1bdda31@us-cdbr-east-04.cleardb.com/heroku_38ec8b215cf2e16?reconnect=true"));
                $cleardb_server = $cleardb_url["us-cdbr-east-04.cleardb.com"];
                $cleardb_username = $cleardb_url["b6bd77d7a28d3b"];
                $cleardb_password = $cleardb_url["f1bdda31"];
                // $cleardb_db = substr($cleardb_url["path"],1);
                $cleardb_db = substr($cleardb_url["heroku_38ec8b215cf2e16"],1);
                $active_group = 'default';
                $query_builder = TRUE;
                // Connect to DB
                $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


        // $servername = 'localhost';
        // $username = 'root';
        // // $password = 'root'; // -> MAMP server
        // $password = ''; // -> WAMP server
        // $dbname = 'wad2_proj';
        
        // // Create connection
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown

        // // Return connection object
        return $conn;
    }

}