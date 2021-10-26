<?php
    class PersonDAO{

        # Retrieve all records from the forumPerson table and return them 
        # as an indexed array of Person objects.
        public function retrieveAll(){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            $sql = "Select * from forumPerson";
            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new Person($row["name"],$row["email"],$row["uni"],$row["country"],$row["fdesc"]);
            }
            $stmt = null;
            $pdo = null;
            return $result;
        }

        # Retrieve all records from the forumPerson table whose
        # country == $country and uni == $uni. 
        # Matching records are returned as an indexed array of Person objects. 
        public function search($country, $uni){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            $sql = "select * from forumPerson where country like :country and uni like :uni";
            // if ($gender === "m" || $gender === "f"){
            //     $sql .= " and gender=:gender";        
            // }
            if ($country === "*" && $uni === "*") {
                $sql = "select * from forumPerson";
            } elseif ($country === "*") {
                $sql = "select * from forumPerson where uni like :uni";
            } elseif ($uni === "*") {
                $sql = "select * from forumPerson where country like :country";
            }

            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($country === "*" && $uni === "*") {
                $stmt->bindParam("uni",$uni);
                $stmt->bindParam("country",$country);
            } elseif ($country === "*") {
                $stmt->bindParam("uni",$uni);
            } elseif ($uni === "*") {
                $stmt->bindParam("country",$country);
            }
            // $stmt->bindParam("country",$country);
            // $stmt->bindParam("uni",$uni);
            // if ($gender === "m" || $gender === "f"){
            //     $stmt->bindParam("gender",$gender);      
            // }
            $stmt->execute();
            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new Person($row["name"],$row["email"],$row["uni"],$row["country"],$row["fdesc"]);
            }
            $stmt = null;
            $pdo = null;
            return $result;
        }

        # Add a post to the database.
        public function addPost($postInput, $postCountry, $postUni, $postName, $postEmail) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            $sql = 'insert into forumPerson (name, email, country, uni, fdesc) 
                    values (:postName, :postEmail, :postCountry, :postUni, :postInput)';
            $stmt = $pdo->prepare($sql);
            // $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(':postInput',$postInput,PDO::PARAM_STR);
            $stmt->bindParam(':postCountry',$postCountry,PDO::PARAM_STR);
            $stmt->bindParam(':postUni',$postUni,PDO::PARAM_STR);
            $stmt->bindParam(':postName',$postName,PDO::PARAM_STR);
            $stmt->bindParam(':postEmail',$postEmail,PDO::PARAM_STR);

            
            // $isAddOK stores true or false        
            $isAddOK = $stmt->execute();

            // if ($isAddOK) {
            //     echo("Successfully submitted!");
            // } else {
            //     echo("An error occured.");
            // }

            $stmt = null;
            $pdo = null;
        }

    }
?>