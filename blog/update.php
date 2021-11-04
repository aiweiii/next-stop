<?php

require_once 'common.php';

$status = false;
//var_dump($_POST);

if( isset($_POST['id']) && isset($_POST['subject']) && isset($_POST['entry'])) {
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $entry = $_POST['entry'];

    $dao = new PostDAO();
    $status = $dao->update($id, $subject, $entry);
}


?>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
<body>
    <?php
        if( $status ) {

            echo "
                <div class='position-absolute top-50 start-50 translate-middle text-center'>
                    <h1> Update was successful! </h1>
                    <a href='display.php' class='btn btn-dark'> Return to <b>Forum</b> </a>
                </div>
            ";

            // echo "<h1>Update was successful!</h1>";
            // echo "<a href='display.php' class='btn btn-dark'> Return to Forum </a>";
        }
        else {
            echo "<h1>Update was NOT successful!</h1>";
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" 
    crossorigin="anonymous"></script>
</body>
</html>