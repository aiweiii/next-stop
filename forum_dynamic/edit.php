<?php

require_once 'common.php';

$id = '';
if( isset($_GET['id']) ) {
    $id = $_GET['id'];

    $dao = new PostDAO();
    $post_object = $dao->get($id); // Get a Post object
    //var_dump($post_object);
}

?>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
<body>

<div class='position-absolute top-50 start-50 translate-middle text-center'>
    <h3 class="text-primary"> Edit Your Post </h3>

    <form action='update.php' method='POST'>

    <?php
        if($post_object) {

            // Hidden Input
            echo "
                <input type='hidden' name='id' value='{$post_object->getID()}'>
            ";

            echo "

                Post is created on: <b> {$post_object->getCreateTimestamp()}</b>
                <br>

                The last update was made on: <b> {$post_object->getUpdateTimestamp()}</b> by <b> {$post_object->getUsername()}</b>
                <br>

                <hr>

                Country: <b> {$post_object->getCountry()} </b>
                <br>

                University: <b> {$post_object->getUniversity()} </b>
                <br>
                <br>


            ";

            echo "
                Subject:
                <input type='text' name='subject' size='30' value='{$post_object->getSubject()}'>
                <br>
            ";

            echo "
                Entry: <br>
                <textarea name='entry' cols='80' rows='5'>{$post_object->getEntry()}</textarea>
                <br>
            ";

            // $selected_Korea = '';
            // $selected_sad = '';
            // $selected_angry = '';

            // $country = $post_object->getCountry();
            
            // if( $country == 'Happy' )
            //     $selected_happy = 'selected';
            // else if( $country == 'Sad' )
            //     $selected_sad = 'selected';
            // else if( $country == 'Angry' )
            //     $selected_angry = 'selected';
            
            // echo "
            //     Country: <select name='country'>
            //             <option value='Happy' $selected_happy>Happy</option>
            //             <option value='Sad' $selected_sad>Sad</option>
            //             <option value='Angry' $selected_angry>Angry</option>
            //           </select>
            //     <br>
            // ";

            echo "
                <br>
                <input type='submit' value='Update!'>
            ";
        }
    ?>

    </form>

    <hr>
    <a href='display.php' class='btn btn-dark'> Return to <b>Forum</b> </a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" 
    crossorigin="anonymous"></script>

</body>
</html>