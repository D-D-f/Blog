<?php
    require_once('./model/admin.php');
    $title = "Créer un article";
    ob_start(); 


    if(isset($_SESSION['connect'])) {
        if(Admin::admin($_SESSION['pseudo'])) { ?>
        <form class="container w-100 d-flex flex-column justify-content-center align-items-center" method="POST">
            <h2>Créer article</h2>
            <p>
                <input type="text" name="title" id="title" placeholder="Titre de l'article">
            </p>
            <p>
                <input type="text" name="resum" id="resum" placeholder="Mini résumé de l'article">
            </p>
            <textarea class="w-50" name="content" id="content" cols="30" rows="10"></textarea>
            <button class="container w-50 btn btn-primary mt-5" type="submit">Ajouter l'article</button>
        </form>
    <?php
            if(isset($_POST['content']) && isset($_POST['title']) && isset($_POST['resum'])) {
                Admin::addArticle($_POST['title'], $_POST['content'], $_POST['resum']);
                header('location: index.php');
                exit();
            }
        } else {
            return false;
        }
    }

    $content = ob_get_clean();
    require('view/template.php');
