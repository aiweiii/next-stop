<?php
require_once 'common.php';
$status = false;
$result = [];

if( isset($_GET['subject']) && isset($_GET['entry']) && isset($_GET['country']) && isset($_GET['university']) && isset($_GET['username'])) {
    $subject = $_GET['subject'];
    $entry = $_GET['entry'];
    $country = $_GET['country'];
    $university = $_GET['university'];
    $username = $_GET['username'];

    $result["subject"] = $subject;

    $dao = new PostDAO();
    $status = $dao->add($subject, $entry, $country, $univeristy, $username);
} else {
    try {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        
        $subject = $data->subject;
        $entry = $data->entry;
        $country = $data->country;
        $university = $data->university;
        $username = $data->username;
    
        $result["subject"] = $subject;
    
        $dao = new PostDAO();
        $status = $dao->add($subject, $entry, $country, $university, $username);
       
    } catch (Exception $e) {
        $status = false;
    }
  
}


if ($status)
    $result["status"] = "Post added successfully";
else 
    $result["status"] = "Post was not added";

$postJSON = json_encode($result);
echo $postJSON;
?>


