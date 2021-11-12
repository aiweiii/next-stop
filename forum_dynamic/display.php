<?php

require_once 'common.php';
require_once '../backend/common.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
} else {
    $username = '';
}

$dao = new PostDAO();
$posts = $dao->getAll();
$posts = array_reverse($posts); // Get an Indexed Array of Post objects
$country = '*';
$university = '*';

    if(isset($_GET["submit"])){
        # Page is visited with search criteria specified
        $country = $_GET["country"];
        $university = $_GET["uni"];

        // debug
        // $country = '*';
        // $university = 'NUS';
        // echo '123';
        // echo $country, $university;
        $posts = $dao->search($country, $university);
        $posts = array_reverse($posts); // Get an Indexed Array of Post objects

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

            

        </style>

        <link rel="stylesheet" href="../navbar/navbar.css">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="css/display.css">

    </head>
<body>


    <!-- navigation bar -->
    <nav>
        <div class="nav-logo">
            <a href="../landing_page/landing_page.html" id="nav-logo">next stop.</a>
        </div>  

        <div class="nav-items" id="nav-items">
            <a href="../homepage/homepage.php" class="nav-item" id="nav-home">Home</a>
            <a href="../forum_dynamic/display.php" class="nav-item" id="nav-forum">Forum</a>
            <a href="../guide/index.php" class="nav-item" id="nav-uniGuide">University Guide</a>
            <a href="../log_in.html" class="nav-item" id="nav-login-signup">Login/Sign Up</a>
            <a href="../validation_page/validation_page.php" class="nav-item" id="nav-username"></a>
        </div>

        <div class="nav-login-signup" id="nav-login-signup-2">
            <a href="../log_in.html" class="nav-login" id="nav-login">Login</a>
            <a href="../sign_up.html" class="nav-signup" id="nav-signup">Sign Up</a>
        </div>

        <a href="../validation_page/validation_page.php" class="user-profile" id="user-profile">
            <div class="profile-pic"><?php print_r($username[0]);?></div>
            <div class="username" id="username"><?php print_r($username);?></div>
        </a>

        <div class="hamburger-menu" id="hamburger-menu" onclick="toggleMenu()">
            <span class="menu menu-small menu-top"></span>
            <span class="menu menu-middle"></span>
            <span class="menu menu-small menu-bottom"></span>
        </div>
    </nav>

    <script>
        var username = '<?php echo $username;?>';
        if (username != '') {
            //for smaller devices
            document.getElementById("nav-login-signup").innerHTML = '';
            document.getElementById("nav-username").innerHTML = 'Profile';

            //for larger devices
            document.getElementById("user-profile").style.display = 'flex';
            document.getElementById("nav-login-signup-2").style.display = "none";
        } else {
            document.getElementById("nav-home").href = '../log_in.html'
        }


        var navItems = document.getElementById("nav-items");
        navItems.style.maxHeight = "0px";
        function toggleMenu() {
            if (navItems.style.maxHeight == "0px") {
                navItems.style.maxHeight = "200px";
            } else {
                navItems.style.maxHeight = "0px";
            }
        }
    </script>

    <!-- end of navigation bar -->

    <div class='big-box'>

        <div class="row mini-box">

            <div class="col-4 to-expand" >
                <div class="sticky-filter left">
                    <a href='add.php' class='btn share-btn' id='share_btn'>+ Share Your Experience!</a>

                    <div class='box'>

                        <div id="app">

                            <!-- search filter -->
                            <h4 class="filter-title pb-4"> Filter Your Search </h4>

                            <form action="">

                            <div class="row pb-2">
                                <label for='country'> Choose a Country: </label>
                                    <select name='country' id='country'  class="form-select ms-2">
                                        <option value='*'> All </option>
                                        <!-- <option value="Korea"> Korea </option> -->
                                        <option v-for="country in countArr" :value="country"> {{country}} </option>
                                    </select>
                                </select>
                            </div>

                            <!--<b> and </b>-->

                            <div class="row choose-uni pb-4">
                                <label for='uni'> Choose a University: </label>
                                    <select name='uni' id='uni'  class="form-select ms-2">
                                        <option value='*'> All </option>
                                        <!-- <option value="SNU"> SNU </option> -->
                                        <option v-for="uni in uniArr" :value="uni"> {{uni}} </option>
                                    </select>
                                </select>
                            </div>
                            <!-- end of search filter -->

                            <br>
                            <input class="btn btn-success go-btn" type="submit" name="submit" id="" value="Go!">
                            <!-- <input class="btn btn-success" type='submit' value='Go!' onclick="{$dao->search($country, $uni)}"/> -->
                            <br>
                            </form>


                        </div>

                    </div>
                </div>
            </div>

            <br>
            <div class='card-to-expand col-8'>
                <?php
                    if( count($posts) > 0 ) {
                        foreach($posts as $post_object ) {
                            echo "
                            <div class='card mb-3'>
                                <div class='card-body'>
                                    <div class='d-flex justify-content-between post-top'>
                                        <h5 class='card-title'>{$post_object->getSubject()}</h5>
                                        <div class='details'>
                                            <span class='badge rounded-pill bg-dark'>{$post_object->getCountry()}</span>
                                            <span class='badge rounded-pill bg-dark'>{$post_object->getUniversity()}</span>
                                        </div>
                                    </div>
                                    
                                    <h6 class='card-subtitle mb-2 text-muted' style='display: none;'> Last Updated: {$post_object->getUpdateTimestamp()}</h6>
                                    <p class='card-text'>{$post_object->getEntry()}</p>
                                    <a style='display: none;' href='edit.php?id={$post_object->getID()}'>Edit</a>
                                    <a style='display: none;' href='delete.php?id={$post_object->getID()}'>Delete</a>
                                    <p class='card-text'><small class='text-muted'>Last updated on {$post_object->getUpdateTimestamp()} by <b>@{$post_object->getUsername()}</b> </small></p>
                                </div>
                            </div>
                            ";
                        }
                    } else{
                        // echo $university, $country;
                        $uni_output = $university;
                        $country_output = $country;

                        if ($university == '*'){
                            $uni_output = 'All Universities';
                        }
                        if ($country == '*'){
                            $country_output = 'All Countries';
                        }
                        echo "<div class='big-text'>Sorry 😢</div>There's no post for <span class='diff_color'>" . $uni_output . "</span> in <span class='diff_color'>" . $country_output . '</span>.<br>Be the first one to <a class="diff_color" href="add.php">post</a>!';
                    }
                ?>
            </div>

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