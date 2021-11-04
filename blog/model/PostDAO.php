<?php

require_once 'common.php';

class PostDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    id,
                    create_timestamp,
                    update_timestamp,
                    subject,
                    entry,
                    country,
                    university,
                    username
                FROM post"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Post(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['update_timestamp'],
                    $row['subject'],
                    $row['entry'],
                    $row['country'],
                    $row['university'],
                    $row['username']
                );
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $posts;
    }

    public function get($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM post
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $post_object = null;
        if( $row = $stmt->fetch() ) {
            $post_object = 
                new Post(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['update_timestamp'],
                    $row['subject'],
                    $row['entry'],
                    $row['country'],
                    $row['university'],
                    $row['username']
                );
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $post_object;
    }

    public function update($id, $subject, $entry) {

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "UPDATE
                    post
                SET
                    update_timestamp = CURRENT_TIMESTAMP,
                    subject = :subject,
                    entry = :entry
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':entry', $entry, PDO::PARAM_STR);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function delete($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "DELETE FROM
                    post
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function add($subject, $entry, $country, $university, $username) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "INSERT INTO post
                    (
                        create_timestamp, 
                        update_timestamp, 
                        subject, 
                        entry, 
                        country,
                        university,
                        username
                    )
                VALUES
                    (
                        CURRENT_TIMESTAMP,
                        CURRENT_TIMESTAMP,
                        :subject,
                        :entry,
                        :country,
                        :university,
                        :username
                    )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':entry', $entry, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':university', $university, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function search($country, $university){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "select * from post where country like :country and university like :university";

        if ($country === "*" && $university === "*") {
            $sql = "select * from post";
        } elseif ($country === "*") {
            $sql = "select * from post where university like :university";
        } elseif ($university === "*") {
            $sql = "select * from post where country like :country";
        }

        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($country === "*" && $university === "*") {
            $stmt->bindParam("uni",$university);
            $stmt->bindParam("country",$country);
        } elseif ($country === "*") {
            $stmt->bindParam("university",$university);
        } elseif ($uni === "*") {
            $stmt->bindParam("country",$country);
        }

        $stmt->execute();
        $result = [];
        while($row = $stmt->fetch()){
            $result[] = new POST($row["id"],$row["email"],$row["uni"],$row["country"],$row["fdesc"]);
        }
        $stmt = null;
        $pdo = null;
        return $result;
    }
}

?>