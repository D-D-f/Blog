<?php
    class Admin {
        public static function admin($pseudo) {
            require('connection.php');
            $requete = $bdd->prepare('SELECT pseudo, droit FROM User WHERE pseudo = ? AND droit = 1');
            $requete->execute([$pseudo]);

            while($result = $requete->fetch()) {
                if($result) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public static function addArticle($title, $text) {
            require('connection.php');
            $requete = $bdd->prepare('INSERT INTO Articles(title, texte) VALUES(?, ?)');
            $requete->execute([$title, $text]);
        }
    }