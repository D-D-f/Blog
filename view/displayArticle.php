<?php
    require('./model/connection.php');
    $requete = $bdd->prepare('SELECT id, title, date, texte FROM Articles WHERE id = ?');
    $requete->execute([$_GET['id']]);

    while($result = $requete->fetch()) {
        $date_en = $result['date'];
        $date_time = strtotime($date_en);
        $date_fr = date('d/m/Y H:i:m', $date_time);
?>
        <div class="titleArcticle">
            <h2><?= $result['title']; ?></h2>
            <span><i><?= $date_fr ?></i></span>
        </div>
        <section>
            <?= $result['texte'] ?>
        </section>
<?php
    }
?>