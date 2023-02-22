<?php
    class ConnectionAccount {
        public static function checkAccount($pseudo, $email, $password) {
            require('connection.php');
            $requete = $bdd->prepare('SELECT pseudo, email, password FROM User WHERE email = ? AND pseudo = ?');
            $requete->execute([$email, $pseudo]);
            
            while($result = $requete->fetch()) {
                if(password_verify($password, $result['password'])) {
                    return true;
                } else {
                    echo $result['password'];
                }
            }
        }

        public static function createSession($pseudo, $email) {
            $_SESSION['connect'] = 1;
            $_SESSION['pseudo'] = strtolower($pseudo);
            $_SESSION['email'] = $email;
        }
    }