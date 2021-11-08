<?php

require_once 'common.php';
$dao = new PostDAO();
$posts = $dao->getAll(); // Get an Indexed Array of Post objects

$items = [];
foreach( $posts as $post_object ) {
    $item = [];
    $item["id"] = $post_object->getID();
    $item["subject"] = $post_object->getSubject();
    $item["entry"] = $post_object->getEntry();
    $item["country"] = $post_object->getCountry();
    $item["university"] = $post_object->getUniversity();
    $item["username"] = $post_object->getUsername();
    $items[] = $item;
}
// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;
?>

