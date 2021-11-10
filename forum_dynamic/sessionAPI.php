<?php 
    require_once '../backend/common.php';

    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $university = $_SESSION['university'];

    echo json_encode($_SESSION);


?>