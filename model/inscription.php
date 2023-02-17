<?php
    class Inscription {
        private $_pseudo;
        private $_email;
        private $_password;

        public function __construct($pseudo, $email, $password) {
            $this->setPseudo($pseudo);
            $this->setEmail($email);
            $this->setPassword($password);
        }

        public function getPseudo() {
            return $this->_pseudo;
        }

        public function getEmail() {
            return $this->_email;
        }

        public function getPassword() {
            return $this->_password;
        }

        public function setPseudo($pseudo) {
            $this->_pseudo = $pseudo;
        }

        public function setEmail($email) {
            $this->_email = $email;
        }

        public function setPassword($password) {
            $this->_password = $password;
        }

        public function saveUser() {
            require('connection.php');
            $requete = $bdd->prepare('INSERT INTO User(pseudo, email, password) VALUES(?, ?, ?)');
            $requete->execute([$this->getPseudo(), $this->getEmail(), $this->getPassword()]);
        }

        public function createSession() {
            $_SESSION['connect'] = 1;
            $_SESSION['pseudo'] = $this->getPseudo();
            $_SESSION['email'] = $this->getEmail();
        }
    }