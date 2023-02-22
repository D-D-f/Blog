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
        $requete = $bdd->prepare('DELETE FROM Comment WHERE id = ?');
        $requete->execute([$_POST['comment_id']]);
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
                    <i class="fa-solid fa-pen-to-square"></i>
                    <form method="POST">
                        <input type="hidden" name="comment_id" value="<?= $result['id']; ?>"/>
                        <input type="submit" name="delete_com" value="delete"/>
                    </form>
                <?php
                ?>
                </div>
                <?php
                }
                ?>
                <span class="date_commentary"><?= Articles::transformDate($result['date']); ?></span>
                
            </div>
            <p class="content_comentary"><?= $result['comment']; ?></p>
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

