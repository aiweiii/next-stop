<?php

require_once 'common.php';

$dao = new PostDAO();
$posts = $dao->getAll();
$posts = array_reverse($posts) // Get an Indexed Array of Post objects


?>


<html>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <style type="text/css">
            /* table {
            margin: 8px;
            }

            th {
            font-family: Arial, Helvetica, sans-serif;
            font-size: .7em;
            background: #666;
            color: #FFF;
            padding: 2px 6px;
            border-collapse: separate;
            border: 1px solid #000;
            }

            td {
            font-family: Arial, Helvetica, sans-serif;
            font-size: .7em;
            border: 1px solid #DDD;
            } */

            .text {
                font-family: Georgia, 'Times New Roman', Times, serif;
            }

            div.sticky {
                position: sticky;
                top: 0;
            }
        </style>

        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="main.css">

    </head>
<body>

    <div class='row'>
        <nav>
            <div class="nav-logo">
                <a href="#" id="nav-logo">next stop.</a>
            </div>  

            <div class="nav-items" id="nav-items">
                <a href="#" class="nav-item" id="nav-home">Home</a>
                <a href="#" class="nav-item" id="nav-forum">Forum</a>
                <a href="#" class="nav-item" id="nav-uniGuide">University Guide</a>
                <a href="#" class="nav-item" id="nav-login-signup">Login/Sign Up</a>
            </div>

            <div class="nav-login-signup">
                <a href="#" class="nav-login" id="nav-login">Login</a>
                <a href="#" class="nav-signup" id="nav-signup">Sign Up</a>
            </div>

            <div class="hamburger-menu" id="hamburger-menu" onclick="toggleMenu()">
                <span class="menu menu-small menu-top"></span>
                <span class="menu menu-middle"></span>
                <span class="menu menu-small menu-bottom"></span>
            </div>
        </nav>

        <script>
            var navItems = document.getElementById("nav-items");
            navItems.style.maxHeight = "0px";
            function toggleMenu(){
                if( navItems.style.maxHeight == "0px" ){
                    navItems.style.maxHeight = "200px";
                } else {
                    navItems.style.maxHeight = "0px";
                }
            }
        </script>
    </div>

    <div class='container'>
        <div class='row header'>
            <h1> Forum </h1>
        </div>

        <div class="row sticky-top" style="background-color: white;">
            <a href='add.html' class='btn btn-warning'><h3> Share Your Experience! </h3></a>

            <div class="col text-center">
            <label for='country'> Choose a Country: </label>
                <select name='country' id='country'>
                    <!-- <option value='SG' selected=$selected>SG</option>
                    <option value='KR' selected=$selected>KR</option>
                    <option value='UK' selected=$selected>UK</option> -->
                    <option value='*'>All</option>
                    <option value='Singapore'> Singapore </option>
                    <option value='Korea'> KR </option>
                    <option value='United Kingdom'>UK</option>
                </select>
            </div>

            <div class="col text-center">
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
                </select>
            </div>




                <br>
                <input type='submit' value='Go!'/>

            
        </div>

        <!-- <div class="row"> -->
            
        <br><div class='row'>

    <?php
        if( count($posts) > 0 ) {

            // echo "

            // ";

            // echo "
            //     <div class='col-sm'>
            //         <table border='1'>
            //             <tr>
            //                 <th>ID</th>
            //                 <th>Create Timestamp</th>
            //                 <th>Last Update Timestamp</th>
            //                 <th>Subject</th>
            //                 <th>Edit Link</th>
            //                 <th>Delete Link</th>
            //             </tr>
            // ";



            foreach($posts as $post_object ) {
                echo "

                <div class='card mb-3 border-warning'>
                    <img src='...' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$post_object->getSubject()}</h5>
                        <h6 class='card-subtitle mb-2 text-muted' style='display: none;'> Last Updated: {$post_object->getUpdateTimestamp()}</h6>
                        <h6 class='card-subtitle mb-2 text-muted'> Country: {$post_object->getCountry()}</h6>
                        <h6 class='card-subtitle mb-2 text-muted'> University: {$post_object->getUniversity()}</h6>
                        <p class='card-text'>{$post_object->getEntry()}</p>
                        <a style='display: none; href='edit.php?id={$post_object->getID()}'>Edit</a>
                        <a style='display: none;' href='delete.php?id={$post_object->getID()}'>Delete</a>
                        <p class='card-text'><small class='text-muted'>Last updated on {$post_object->getUpdateTimestamp()} by <b>@{$post_object->getUsername()}</b> </small></p>
                    </div>
                </div>
                ";
            }

            // <div class='card mb-3 border-warning'>
            //     <div class='card-body'>
            //         <h5 class='card-title'>{$post_object->getSubject()}</h5>
            //         <h6 class='card-subtitle mb-2 text-muted'> Last Updated: {$post_object->getUpdateTimestamp()}</h6>
            //         <h6 class='card-subtitle mb-2 text-muted'> Country: {$post_object->getCountry()}</h6>
            //         <h6 class='card-subtitle mb-2 text-muted'> University: {$post_object->getUniversity()}</h6>
            //         <p class='card-text'>{$post_object->getEntry()}</p>
            //         <a style='display: none; href='edit.php?id={$post_object->getID()}'>Edit</a>
            //         <a style='display: none;' href='delete.php?id={$post_object->getID()}'>Delete</a>
            //     </div>
            // </div>

            //     <tr>
            //     <td>
            //         {$post_object->getID()}
            //     </td>
            //     <td>
            //         {$post_object->getCreateTimestamp()}
            //     </td>
            //     <td>
            //         {$post_object->getUpdateTimestamp()}
            //     </td>
            //     <td>
            //         {$post_object->getSubject()}
            //     </td>
            //     <td>
            //         <a href='edit.php?id={$post_object->getID()}'>Edit</a>
            //     </td>
            //     <td>
            //         <a href='delete.php?id={$post_object->getID()}'>Delete</a>
            //     </td>
            // </tr>

            // echo "
            //     </table>
            // ";
        }
    ?>

            </div>

        <!-- </div> -->

    </div>

        <!-- bootstrap -->    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" 
        crossorigin="anonymous"></script>
</body>
</html>