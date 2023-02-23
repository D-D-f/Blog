<?php
    require('./model/connection.php');
    require('./model/articles.php');
    ob_start(); 

    if(!empty($_POST['commentary'])) {
        Articles::addComment($_SESSION['pseudo'], $_POST['commentary'], $_GET['id']);
        header('location: ./?page=article&id='. $_GET['id']);
        exit();
    }

    if(!empty($_POST['comment_id'])) {
        Articles::deleteComment($_POST['comment_id']);
    }
?>
    <div class="img">
    </div>

<?php
    $requete = $bdd->prepare('SELECT id, title, date, texte FROM Articles WHERE id = ?');
    $requete->execute([$_GET['id']]);

    while($result = $requete->fetch()) {
        $date = Articles::transformDate($result['date']);
?>
        <div class="">
            <h2><?= $result['title']; ?></h2>
            <span><i><?= $date ?></i></span>
        </div>
        <section>
            <?= $result['texte'] ?>
        </section>
<?php
    }

    $commentary = $bdd->prepare('SELECT id, pseudo, comment, id_articles, date FROM Comment WHERE id_articles = ?');
    $commentary->execute([$_GET['id']]);

    while($result = $commentary->fetch()) {
        ?>
        <div class="commentary d-flex align-items-center">
            <div class="cadre_user">
                <div class="user d-flex justify-content-around align-items-center">
                    <img src="public/assets/img/user.jpg" alt="logo user">
                    <h4 class="pseudo_commentary"><?= $result['pseudo']; ?></h4>                    
                </div>
                <?php if(!empty($_SESSION['connect']) && $_SESSION['pseudo'] == $result['pseudo']) { ?>
                <div class="com d-flex justify-content-evenly">
                    <form method="POST">
                        <input type="hidden" name="edit_com" value="<?= $result['id']; ?>"/>
                        <button type="submit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </form>
                    
                    <form method="POST">
                        <input type="hidden" name="comment_id" value="<?= $result['id']; ?>"/>
                        <button type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                <?php
                ?>
                </div>
                <?php
                }
                ?>
                <span class="date_commentary"><?= Articles::transformDate($result['date']); ?></span>
            </div>

            <?php
                if(!empty($_POST["edit_com"]) && $result['id'] == $_POST['edit_com']) {
            ?>
                    <form class="form_text" method='POST'>
                        <input type="hidden" name="id_comment" value="<?= $result['id']; ?>"/>
                        <textarea class="text_com" name="edit_commentary" id="edit_commentary" cols="30" rows="10"></textarea>
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </form>
            <?php
                  
                } else {
            ?>
                    <p class="content_comentary"><?= $result['comment']; ?></p>
            <?php
                }
                if(!empty($_POST['edit_commentary'])) {
                    Articles::updateComment($_POST['edit_commentary'], $_POST['id_comment']);
                    header('location: ./?page=article&id=' . $result['id_articles']);
                    exit();
                }
            ?>
            
        </div>
        <?php
    }

    if(!empty($_SESSION['connect'])) {
?>
<form class="form_text" method='POST'>
    <textarea class="text_com" name="commentary" id="commentary" cols="30" rows="10"></textarea>
    <button class="btn btn-primary" type="submit">Envoyer</button>
</form>

<?php
    }
    
    $content = ob_get_clean();
    require('view/template.php');
?>

