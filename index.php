<?php
    session_start();
    require('./controller/controller.php');
       
    if(isset($_GET['page'])) {
        if($_GET['page'] == "inscription") {
            inscription();
        } else if($_GET['page'] == "connexion") {
            connection();
        } else if($_GET['page'] == "article" && isset($_GET['id'])) {
            article();
        }
    } else {
        home();
    }

    