<?php
    class Security {
        public static function code($password) {
            return password_hash($password, PASSWORD_DEFAULT);
        }
    }
