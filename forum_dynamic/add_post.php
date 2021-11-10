<?php

require_once 'common.php';

$status = false;
//var_dump($_POST);

// echo '123';
// echo $_POST['subject'], $_POST['entry'], $_POST['country'], $_POST['university'];
// echo $_POST['username'];
if( isset($_POST['subject']) && isset($_POST['entry']) && isset($_POST['country']) && isset($_POST['university']) && isset($_POST['username'])) {
    $subject = $_POST['subject'];
    $entry = $_POST['entry'];
    $country = $_POST['country'];
    $university = $_POST['university'];
    $username = $_POST['username'];

    $dao = new PostDAO();
    $status = $dao->add($subject, $entry, $country, $university, $username);
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
                        <h1> Thank you for sharing your experience! </h1>
                        <a href='display.php' class='btn btn-dark'> Return to <b>Forum</b> </a>
                    </div>
                ";
                // echo "<a href='display.php' class='btn btn-dark'> Return to Forum </a>";
            }
            else {
                echo "<h1>Insertion was NOT successful</h1>";
            }
        ?>

    <!-- bootstrap -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" 
    crossorigin="anonymous"></script>
    </body>
</html>