<?php 
    require_once '../backend/common.php';

    // $_GET = json_decode(file_get_contents("php://input"),true);

    $university = $_GET["university"];
    // $university = "University of Vienna";

    $dao = new UserDAO();
    $users = $dao->get_students($university);

    $username_list = [];
    if ($users != []){
        // echo 'works';
        foreach ($users as $user){
            $username_list[] = $user->getFullname();
        }
    }

    echo json_encode($username_list);

    
?>