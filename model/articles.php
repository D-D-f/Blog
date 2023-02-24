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

        public static function deleteComment($id) {
            require('connection.php');
            $requete = $bdd->prepare('DELETE FROM Comment WHERE id = ?');
            $requete->execute([$id]);
        }

        public static function updateComment($comment, $id) {
            require('connection.php');
            $requete = $bdd->prepare('UPDATE Comment SET comment = ? WHERE id = ?');
            $requete->execute([$comment, $id]);
        }

        public static function deleteArticles($id) {
            require('connection.php');
            $requete = $bdd->prepare('DELETE FROM Articles WHERE id = ?');
            $requete->execute([$id]);
        }

        public static function updateArticles($texte, $id) {
            require('connection.php');
            $requete = $bdd->prepare('UPDATE Articles SET texte = ? WHERE id = ?');
            $requete->execute([$texte, $id]);
        }

        public static function deleteAllCommentArticles($id) {
            require('connection.php');
            $requete = $bdd->prepare('DELETE FROM Comment WHERE id_articles = ?');
            $requete->execute([$id]);
        }
    }