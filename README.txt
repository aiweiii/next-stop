IS216_G5T9_WAD2_ProjectApplication
    next stop.

IMPORTANT NOTE:
    Due to some technical errors from our cloud server, our deployed application (deployed on Heroku) has some issues rendering certain features.
    To enjoy the full experience of our application, please run it locally.



Step by Step instructions for running on localhost:
a) How to set up our application based on the submitted files:
    1. Unzip the folder 'IS216_G5T9_WAD2_ProjectApplication'.
    2. Place unzipped 'IS216_G5T9_WAD2_ProjectApplication' folder into your www (Windows) or htdocs (Mac) folder.
            e.g. www/IS216_G5T9_WAD2_ProjectApplication
    3. Start your WAMP (Windows) or MAMP (Mac) server

b) How to run our application:
    1. First page is accessible via index.html. 
            e.g. When running locally, localhost/IS216_G5T9_WAD2_ProjectApplication/index.html will load the first page of our application
    2. Our application's database is connected through our database server, CloudDB. Hence, there is no need to run any SQL script. 
       However, in the case where there is connectivity issues with the database, please do the following:
            1. Go to localhost/phpmyadmin/index.php
            2. Click on "Import" at the menu
            3. Select 'data.sql'
            4. Click 'GO' to create the database and populate it with sample data
            5. Go to IS216_G5T9_WAD2_ProjectApplication/backend/model/ConnectionManager.php
            6. Uncomment lines 6 to 15 and comment lines 17 to 26
                    If you are using MAMP, uncomment line 9 and comment out line 10
            7. Go to IS216_G5T9_WAD2_ProjectApplication/forum_dynamic/model/ConnectionManager.php
            8. Uncomment lines 6 to 15 and comment lines 17 to 26
                    If you are using MAMP, uncomment line 9 and comment out line 10



Step by Step instructions for running on Cloud:
    1. Go to  https://our-next-stop.herokuapp.com/
    * Please note that some features are unavailable on our deployed application. 
      For the full experience, please run our application locally.