<?php

require_once 'common.php';

$dao = new PostDAO();
$posts = $dao->getAll();
$posts = array_reverse($posts); // Get an Indexed Array of Post objects

    if(!empty($_POST)){
        # Page is visited with search criteria specified
        $country = $_POST["country"];
        $uni = $_POST["uni"];
        $filtered_list = $dao->search($country, $uni);    
        // var_dump($person_list);
    }

?>


<html>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <!-- Axios -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Vue3 CDN -->
        <script src="https://unpkg.com/vue@next"></script>

        <style type="text/css">
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

            <div id="app" class="text-center">

            <br>

            <h4> Filter Your Search </h4>

                <div class="row text-center">
                    <label for='country'> Choose a Country: </label>
                        <select name='country' id='country'>
                            <option value='*'> All </option>
                            <option value="Korea"> Korea </option>
                            <option v-for="country in countArr" :value="country"> {{country}} </option>
                        </select>
                    </select>
                </div>

                <b> or </b>

                <div class="row text-center">
                    <label for='uni'> Choose a University: </label>
                        <select name='uni' id='uni'>
                            <option value='*'> All </option>
                            <option value="SNU"> SNU </option>
                            <option v-for="uni in uniArr" :value="uni"> {{uni}} </option>
                        </select>
                    </select>
                </div>


                <br>
                <input class="btn btn-success" type='submit' value='Go!'/>
                <br>

            </div>

        </div>

        

        <!-- <div class="row"> -->
        <br>
        <div class='row'>

            <?php
                if( count($posts) > 0 ) {

                    foreach($posts as $post_object ) {
                        echo "

                        <div class='card mb-3 border-warning'>
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

                }
            ?>

        </div>

    </div>

    <script>

    const app = Vue.createApp( {
        //=========== DATA PROPERTIES ===========
        data() {
            return {
                uniArr: [],
                countArr: [],
            }
        },

        //=========== METHODS =========== 
        methods: {
            addChild() {
                var url = "../countries.json";
                axios.get(url) 
                .then(response => {
                    var myCountries = response.data;
                    var universities = []
                    var countries = []
                    for (let i=0; i<myCountries.length; i++){
                        if (!countries.includes(myCountries[i]['Country'])) {
                            countries.push(myCountries[i]['Country'])
                        }
                        universities.push(myCountries[i]['University'])
                    }
                    this.uniArr = universities;
                    this.countArr = countries;
                    // console.log(this.uniVar);
                    // console.log(this.countryVar);
                    // return universities, countries
                })
                .catch(error => {
                    console.log(error.message)
                })
            }
        },

        created() {
            this.addChild()
        },
    } )
    const vm = app.mount('#app')

    </script>

        <!-- bootstrap -->    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" 
        crossorigin="anonymous"></script>
</body>
</html>