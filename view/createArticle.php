<?php
    require_once('./model/admin.php');

    if(isset($_SESSION['connect'])) {
        if(Admin::admin($_SESSION['pseudo'])) {
    ?>
        <form method="POST">
            <h2>Créer article</h2>
            <p>
                <input type="text" name="title" id="title">
            </p>
            <p>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </p>
            <button type="submit">Ajouter l'article</button>
        </form>
    <?php
            if(isset($_POST['content']) && isset($_POST['title'])) {
                Admin::addArticle($_POST['title'], $_POST['content']);
            }
        } else {
            return false;
        }
    }
?>