<?php
    require_once "trialCommon.php";
    $dao = new PersonDAO();
    $person_list = [];

    if(!empty($_POST)){
        # Page is visited with search criteria specified
        $country = $_POST["country"];
        $uni = $_POST["uni"];
        $person_list = $dao->search($country, $uni);    
        // var_dump($person_list);
    }
    else{
        # Page loads for the first time
        $person_list = $dao->retrieveAll();
    }
?>

<html>
    <head>
        <!-- <style>
            table,th,td{
                border: 1px solid black;
            }
        </style> -->

        <!-- script -->

        <link rel="stylesheet" href="./trial.css">

        <title>next stop. Forum</title>
    </head>
    <body>

    <h1>Forum</h1>

    <div class="forumInput">
    <!-- <div class="flex-container"> -->

    <form method='POST' action="trialDisplay.php">

        New Post: <input type="text" name="postInput" class="fill-width" id="postInput"/><br>

        <div class="forumDetails">
        Country: <input type="text" name="postCountry" id="postInfo"/> 
        University: <input type="text" name="postUni" id="postInfo"/>
        Name: <input type="text" name="postName" id="postInfo"/> 
        Email: <input type="text" name="postEmail" id="postInfo"/> <br/>

        <br>
        <input type="submit" name="submit"/>
        </div>

    </div>

    <div class="forumOutput">
        <br> <br>
        <label for='country'> Choose a Country: </label>
            <select name='country' id='country'>
                <!-- <option value='SG' selected=$selected>SG</option>
                <option value='KR' selected=$selected>KR</option>
                <option value='UK' selected=$selected>UK</option> -->
                <option value='*'>All</option>
                <option value='SG'>SG</option>
                <option value='KR'>KR</option>
                <option value='UK'>UK</option>
            </select>

        <br>
        <label for='uni'> Choose a University: </label>
            <select name='uni' id='uni'>
                <!-- <option value='NUS' selected=$selected>NUS</option>
                <option value='NTU' selected=$selected>NTU</option>
                <option value='SNU' selected=$selected>SNU</option>
                <option value='YSU' selected=$selected>YSU</option>
                <option value='UOM' selected=$selected>UOM</option>
                <option value='UOL' selected=$selected>UOL</option> -->

                <option value='*'>All</option>
                <option value='NUS'>NUS</option>
                <option value='NTU'>NTU</option>
                <option value='SNU'>SNU</option>
                <option value='YSU'>YSU</option>
                <option value='UOM'>UOM</option>
                <option value='UOL'>UOL</option>
            </select>

            <br>
            <input type='submit' value='Go!'/>
    </div>

    </form>

        <!-- php code -->

        <?php

            $postInput = "";
            $postCountry = "";
            $postUni = "";
            $postName = "";
            $postEmail = "";

            $country = "";
            $uni = "";
            // $selected = "";

            if(!empty($_POST)) {
                $country = $_POST['country']; 
                $uni = $_POST['uni'];
                // $selected = "selected";

                $postInput = $_POST['postInput'];
                $postCountry = $_POST['postCountry'];
                $postUni = $_POST['postUni'];
                $postName = $_POST['postName'];
                $postEmail = $_POST['postEmail'];
                $dao->addPost($postInput, $postCountry, $postUni, $postName, $postEmail);
            } else {
                $selected = "";
            }

            // echo($country);
            // echo(" ");
            // echo($uni);
            // echo("<br>");

            // echo "
            //         <label for='country'> Choose a Country: </label>
            //             <select name='country' id='country'>
            //                 <option value='SG' selected=$selected>SG</option>
            //                 <option value='KR' selected=$selected>KR</option>
            //                 <option value='UK' selected=$selected>UK</option>
            //             </select>

            //             <br>
            //             <label for='uni'> Choose a University: </label>
            //             <select name='uni' id='uni'>
            //                 <option value='NUS' selected=$selected>NUS</option>
            //                 <option value='NTU' selected=$selected>NTU</option>
            //                 <option value='SNU' selected=$selected>SNU</option>
            //                 <option value='YSU' selected=$selected>YSU</option>
            //                 <option value='UOM' selected=$selected>UOM</option>
            //                 <option value='UOL' selected=$selected>UOL</option>
            //             </select>

            //             <br>

            //             <input type='submit' value='Go!'/>";
        ?>

    <table id="forumTable">
        <tr> 
            <th>Name</th> 
            <th>Email</th> 
            <th>University</th> 
            <th>Country</th> 
            <th>Description</th> 
        <?php   
            // Print out person details row by row
            foreach($person_list as $person){
                echo "<tr>";
                echo "<td>{$person->getName()}</td>";
                echo "<td>{$person->getEmail()}</td>";
                echo "<td>{$person->getUni()}</td>";
                echo "<td>{$person->getCountry()}</td>";
                echo "<td>{$person->getFDesc()}</td>";
                // echo "<td>" . strtoupper($person->getGender()). "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    </body> 
</html>