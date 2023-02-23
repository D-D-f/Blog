<?php
    require('model/inscription.php');

    function inscription() {
        require('view/formulaire.php');
    }

    function connection() {
        require('view/coAccount.php');
    }

    function home() {
        require('view/home.php');
    }

    function article() {
        require("view/displayArticle.php");
    }

    function createArticle() {
        require('view/createArticle.php');
    }