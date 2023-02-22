<?php 
    class Articles {
        public static function transformDate($date) {
            $date_en = $date;
            $date_time = strtotime($date_en);
            $date_fr = date('d/m/Y H:i:m', $date_time);
            return $date_fr;
        }

        public static function addComment($pseudo, $comment, $idArticles) {
            require('connection.php');
            $requete = $bdd->prepare('INSERT INTO Comment(pseudo, comment, id_articles) VALUES(?, ?, ?)');
            $requete->execute([$pseudo, $comment, $idArticles]);
        }

        public static function deleteComment() {
            
        }
    }