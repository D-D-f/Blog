<?php
    require('./model/connection.php');

    $requete = $bdd->prepare('SELECT id, title, date, texte FROM Articles');
    $requete->execute();

    while($result = $requete->fetch()) {
        $date_en = $result['date'];
        $date_time = strtotime($date_en);
        $date_fr = date('d/m/Y H:i:m', $date_time);
        $id = $result['id'];
        $url = "./?page=article&id=" .$id;

        echo "$id";
?>

        <a href="<?php echo $url; ?>">
            <div class="card" style="width: 18rem;">
                <img src="public/assets/img/porto.png" class="card-img-top" alt="fc porto mascotte">
                <div class="card-body">
                    <h5 class="card-title"><?= $result['title'] ?></h5>
                    <p class="card-text"><?= $result['texte'] ?></p>
                    <button class="btn btn-primary">Voir plus</button>
                </div>
            </div>
        </a>
<?php
    }
?>