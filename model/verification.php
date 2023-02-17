<?php
    class Verification {
        public static function syntaxeEmail($email) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }

        public static function pseudoDouble($pseudo) {
            require('./model/connection.php');
            $requete = $bdd->prepare('SELECT COUNT(*) AS nombre FROM User WHERE pseudo = ?');
            $requete->execute([$pseudo]);

            while($result = $requete->fetch()) {
                if($result['nombre'] != 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public static function emailDouble($email) {
            require('./model/connection.php');
            $requete = $bdd->prepare('SELECT COUNT(*) AS nombre FROM User WHERE email = ?');
            $requete->execute([$email]);

            while($result = $requete->fetch()) {
                if($result['nombre'] != 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public static function passwordVerif($password, $password2) {
            if($password === $password2) {
                return true;
            } else {
                return false;
            }
        } 
    }