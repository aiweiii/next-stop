<?php

class UserDAO {

    function get( $email ) {
        
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare select
        $sql = "SELECT fullname, email, password_hash, university FROM user_info WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            
        $user = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $user = new User($row["fullname"], $row["email"], $row["password_hash"], $row["university"]);
            }
            
        }
        else {
            $connMgr->handleError( $stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $user;
    }

    function get_students( $university ) {
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare select
        $sql = "SELECT fullname, email, password_hash, university FROM user_info WHERE university = :university";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":university", $university, PDO::PARAM_STR);
            
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $users = [];
        while( $row = $stmt->fetch() ) {
            $users[] =
                new User(
                    $row["fullname"], 
                    $row["email"], 
                    $row["password_hash"], 
                    $row["university"]
                );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $users;
    }
    
    function create($user) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO user_info (fullname, email, password_hash, university) VALUES (:fullname, :email, :password_hash, :university)";
        $stmt = $conn->prepare($sql);
        
        $full_name = $user->getFullname();
        $email = $user->getEmail();
        $password_hash = $user->getPasswordhashed();
        $university = $user->getUniversity();

        $stmt->bindParam(":fullname", $full_name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password_hash", $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(":university", $university, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;
        
        return $result;
    }


    function update($user) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "UPDATE user_info SET university = :university  WHERE email = :email";
        $stmt = $conn->prepare($sql);
        
        $email = $user->getEmail();
        $university = $user->getUniversity();

        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":university", $university, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}